    <?php
    $url = new SimpleURL();
    $path = (string) $url;
    $segments = $url->splitted_path;
    ?>
    You requested the URL <?php echo $path; ?>. This Request is parsed as <pre>
    <?php print_r($segments); ?>
    </pre> Which contains <?php echo $url->count(); ?> segments.
