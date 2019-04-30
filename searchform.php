<form action="/" method="get" class="form-inline">
    <input class="input-search form-control" type="text" placeholder="Search" name="s" id="search" value="<?php the_search_query(); ?>" aria-label="Search">
    <input type="hidden" value="1" name="sentence" id="sentence" />
    <button class="btn btn-search" type="submit"><i class="fas fa-search"></i></button>
</form>
