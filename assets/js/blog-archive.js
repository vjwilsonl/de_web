var blogGetBtn = document.getElementById('blog-get-btn');
var blogGetDiv = document.getElementById('blog-get-div');
var blogList = document.getElementById('blog-list');
var pageCounter = 1;
var postPerPage = 6;

var dateOptions = {
  year: 'numeric',
  month: 'long',
  day: 'numeric'
};

if (blogGetBtn) {
  blogGetBtn.addEventListener('click', function() {
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

function getPosts(e) {
  var blogRequest = new XMLHttpRequest();
  blogRequest.open(
    'GET',
    'http://localhost:8888/wp-json/wp/v2/posts?page=' +
      pageCounter +
      '&per_page=' +
      postPerPage +
      '&tags_exclude=' +
      customData.featuredId
  );
  blogRequest.onload = function() {
    if (blogRequest.status >= 200 && blogRequest.status < 400) {
      var data = JSON.parse(blogRequest.responseText);
      prepareHTML(data);
      console.log('hey');
      pageCounter++;
      toggleShowMore(blogRequest.getResponseHeader('X-WP-TotalPages'));
    } else {
      toggleShowMore(blogRequest.getResponseHeader('X-WP-TotalPages'));
      blogList.innerHTML +=
        '<p class="col-sm-12">There are no blogs published yet. Come back later.</p>';
    }
  };

  blogRequest.onerror = function() {
    console.log('Connection error');
  };

  blogRequest.send();
}

function toggleShowMore(totalPages) {
  if (totalPages < pageCounter) {
    blogGetDiv.style.display = 'none';
  } else {
    blogGetDiv.style.display = 'inline-block';
  }
}

function prepareHTML(data) {
  var html = '';
  if (data.length > 0) {
    for (var i = 0; i < data.length; i++) {
      var published_date = new Date(data[i].date_gmt);
      html += '<div class="col-sm-12 col-lg-4 blog-card"><a class="" href="';
      html += data[i].link;
      html += '"><div class="blog-image"><img src="';
      html += data[i].fimg_url;
      html += '" alt="';
      html += data[i].title.rendered;
      html +=
        '" class="blog-cover"><div class="blog-image-hover"></div></div></a><div class="blog-body"><p class="blog-date">';
      html += published_date.toLocaleDateString('en-US', dateOptions);
      html += '</p><h2 class="blog-title">';
      html += data[i].title.rendered;
      html += '</h2><p class="blog-text">';
      html += data[i].trimmed_content + ' (...)';
      html += '</p><p class="blog-read"><a class="" href="';
      html += data[i].link;
      html +=
        '">READ MORE &nbsp; <i class="fas fa-arrow-right"></i></a></p></div></div>';
    }
    blogList.innerHTML += html;
  } else {
    blogList.innerHTML =
      '<p class="col-sm-12">There are no blogs published yet. Come back later.</p>';
  }
}
