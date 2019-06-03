<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Instagram</title>
</head>
<body>

<?php 

    include_once "instagram.php";

    $items = getImages($limit);
    $total_items = count($items);

    if ( $total_items <= 0 ) {
        
        $output = 'No hay publicaciones a mostrar';

    } else {
        $output = '<div class="row">';

        for ($i=0; $i < $limit; $i++) {
            // break if total items less than count
            if($i == $total_items){
                break;
            }

            $output .= '<div class="col-6 col-md-3 pb-3">';
            $output .= (!empty($items[$i]->images->standard_resolution->url)) ? '<a class="sppb-instagram-gallery-btn" href="' . $items[$i]->link . '" target="_blank">' : '';
            $output .= '<div class="addon-instagram-item-wrap">';

            $output .= '<div class="addon-instagram-image-wrap">';
            $output .= '<img class="instagram-image img-fluid" src="' . $items[$i]->images->standard_resolution->url . '" alt="">';
            $output .= '</div>';
            
            $output .= '</div>';
            
            $output .= (!empty($items[$i]->images->standard_resolution->url)) ? '</a>' : '';
            $output .= '</div>';

            }
        $output .= '</div>';
    }

    echo $output;    

?>

    
</body>
</html>