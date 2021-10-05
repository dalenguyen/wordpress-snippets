//Show the number of posts in an archive page

//get the term object
$term = get_queried_object();
//get the number of posts in that term
$term->count;


//Show the number of posts of any term by any identifier (e.g. for the term category and the term with id 1)

$term = get_term_by('id', 1, 'category');
$term->count();