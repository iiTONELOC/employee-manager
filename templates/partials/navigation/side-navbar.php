<?php
$links = [
    [
        'title' => 'Dashboard',
        'url' => 'templates/dashboard.php',
        'icon' => 'bi bi-speedometer2',
        'class' => 'mb-1'
    ],
    [
        'title' => 'Logout',
        'url' => 'lib/utils/logout.php',
        'icon' => 'bi bi-box-arrow-right',
        'class' => 'ms-1'
    ]
];

function createLinks()
{
    global $links;
    $currentPage = basename($_SERVER['REQUEST_URI']);
    
    foreach ($links as $link) {

        $title = $link['title'];
        $url = $link['url'];
        $icon = $link['icon'];
        $class = $link['class'];

        $activeClass = $currentPage == $link['url'] ? 'active' : '';

        $html = <<<HTML
        <span
            class="p-1 side-nav-link $activeClass"
            data-bs-toggle="tooltip"
            data-bs-placement="top"
            title="$title"
            >

            <a class="fs-6 $class" href="$url">
                <i class="$icon fs-3"></i>
            </a>
        </span>
        HTML;
        echo $html;
    }
}
?>





<nav class="side-nav">
    <?php createLinks(); ?>
</nav>
