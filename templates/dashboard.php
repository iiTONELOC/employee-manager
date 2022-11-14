<section class="container-fluid dashboard p-0">
    <div class="dash-wrapper">
        <div class="bg-dark sidebar">
            <?php
                include_once 'templates/partials/navigation/side-navbar.php';
            ?>
        </div>
        <div class="dash-main">

            <section class="data-view">
                <div class="table-container">
                    <?php
                    // Bring in the view loader
                    include_once 'lib/helpers/dashboard-main-view-loader.php';
                    ?>
                </div>
            </section>

            <?php include_once 'templates/partials/menu-options/menu-options.php'; ?>
        </div>
    </div>
</section>

<script src="public/js/autoToggle.js"></script>
