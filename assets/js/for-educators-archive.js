var forEducatorsGetBtn = document.getElementById('for-educators-get-btn');
var forEducatorsGetDiv = document.getElementById('for-educators-get-div');
var forEducatorsList = document.getElementById('for-educators-block');
var pageCounter = 1;
var postPerPage = 2;

var dateOptions = {
  year: 'numeric',
  month: 'long',
  day: 'numeric'
};

if (forEducatorsGetBtn) {
  forEducatorsGetBtn.addEventListener('click', function(e) {
    getPosts();
  });
}

// execute load post on page loaded complete
document.addEventListener(
  'DOMContentLoaded',
  function() {
    getPosts();
  },
  false
);

function getPosts() {
  var forEducatorRequest = new XMLHttpRequest();
  forEducatorRequest.open(
    'GET',
    'http://localhost:8888/wp-json/wp/v2/for_educators?page=' +
      pageCounter +
      '&per_page=' +
      postPerPage
  );
  forEducatorRequest.onload = function() {
    if (forEducatorRequest.status >= 200 && forEducatorRequest.status < 400) {
      var data = JSON.parse(forEducatorRequest.responseText);
      // console.log(forEducatorRequest.getResponseHeader('X-WP-TotalPages'));
      prepareHTML(data);
      pageCounter++;
      toggleShowMore(forEducatorRequest.getResponseHeader('X-WP-TotalPages'));
    } else {
      toggleShowMore(forEducatorRequest.getResponseHeader('X-WP-TotalPages'));
      forEducatorsList.innerHTML +=
        '<p class="col-sm-12">There are no posts published yet. Come back later.</p>';
    }
  };

  forEducatorRequest.onerror = function() {
    console.log('Connection error');
  };

  forEducatorRequest.send();
}

function toggleShowMore(totalPages) {
  if (totalPages < pageCounter) {
    forEducatorsGetDiv.style.display = 'none';
  } else {
    forEducatorsGetDiv.style.display = 'inline-block';
  }
}

function prepareHTML(data) {
  var html = '';
  if (data.length > 0) {
    for (var i = 0; i < data.length; i++) {
      html +=
        '<div class="col-sm-12 col-lg-4 for-educators-card"><a class="" href="';
      html += data[i].link;
      html += '"><div class="for-educators-image"><img src="';
      html += data[i].fimg_url;
      html += '" alt="';
      html += data[i].title.rendered;
      html +=
        '" class="for-educators-cover"><div class="for-educators-image-hover"></div></div></a><div class="for-educators-body"><h2 class="for-educators-title"><a class="" href="';
      html += data[i].link;
      html += '">';
      html += data[i].title.rendered;
      html += '</a></h2></div></div>';
    }
    forEducatorsList.innerHTML += html;
  } else {
    forEducatorsList.innerHTML =
      '<p class="col-sm-12">There are no posts published yet. Come back later.</p>';
  }
}
