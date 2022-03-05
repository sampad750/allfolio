<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package allfolio
 */

get_header();

?>
<!-- Banner Section -->
<section class="portfolio-classic-banner">
    <div class="container">
        <div class="row">
            <div class="col-md-6 section-title mx-auto">
                <span class="subtitle">CASE Study</span>
                <h1>Guillaume Bouvet</h1>
            </div>
        </div>
    </div>
</section>
<section class="bg-muted">
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="portfolio-project-feature">
                    <div class="project-action">
                        <div>Date:<span>Jun 2021</span></div>
                        <div>Status:<span>Online</span></div>
                        <div class="device-view">
                            <a class="me-2" href=""> <i class="fas fa-desktop"></i></a>
                            <a href=""> <i class="fas fa-mobile-alt"></i></a>

                        </div>
                        <div>
                            <a href=""> <img src="img/portfolio_classic/return-down-forward.svg" alt=""> View
                                site</a>
                        </div>
                        <div>
                            <a href=""> <img src="img/portfolio_classic/return-down-forward-2.svg" alt="">
                                Share</a>
                        </div>
                    </div>
                    <div class="project-info row">
                        <div class="col-md-3">
                            <h6>Project</h6>
                            <p>Global identity and website for the design Guillaume Bouvet</p>
                        </div>
                        <div class="col-md-3">
                            <h6>Deliverables</h6>
                            <p>Concept, UX, Art Direction, Development</p>
                        </div>
                        <div class="col-md-3">
                            <h6>Awards & mentions</h6>
                            <p>Awards Site of the Day. Site inspire.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="portfolio-project-post bg-muted">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="single-post">
                    <h2>Prject design Title</h2>
                    <div class="post-meta">
                        <a href=""> <img src="img/portfolio_classic/pencil-.svg" alt="">
                            Integrity
                        </a>
                        <a href=""> <img src="img/portfolio_classic/calendar-outline.svg" alt="">
                            Aug 5, 2020
                        </a>
                        <a href=""> <img src="img/portfolio_classic/bookmark-outline.svg" alt="">
                            PHP
                        </a>
                    </div>

                    <p>It is a long established fact that a reader will be distracted by the readable content of
                        a page when looking at its layout. The point of using Lorem Ipsum is that it has a
                        more-or-less normal distribution of letters, as opposed to using 'Content here, content
                        here', making it look like readable English. Many desktop publishing packages and web
                        page editors now use Lorem Ipsum as their default model text, and a search</p>
                    <p>It is a long established fact that a reader will be distracted by the readable content of
                        a page when looking at its layout. The point of using Lorem Ipsum is that it has a
                        more-or-less normal distribution of letters, as opposed to using 'Content here, content
                        here', making it look like readable English. Many desktop publishing packages and web
                        page editors now use Lorem Ipsum as their default model text, and a search</p>
                    <p>It is a long established fact that a reader will be distracted by the readable content of
                        a page when looking at its layout. The point of using Lorem Ipsum is that it has a
                        more-or-less normal distribution of letters, as opposed to using 'Content here, content
                        here', making it look like readable English. Many desktop publishing packages and web
                        page editors now use Lorem Ipsum as their default model text, and a search</p>
                </div>
            </div>
            <div class="col-md-3 offset-md-1">
                <div class="prject-sidebar">
                    <div class="tag-widget">
                        <h4 class="title">Tag</h4>
                        <ul class="list-unstyled">
                            <li><a href="#"><i class="fas fa-check"></i> Web Design</a></li>
                            <li><a href="#"><i class="fas fa-check"></i> WordPress</a></li>
                            <li><a href="#"><i class="fas fa-check"></i> JavaScript</a></li>
                        </ul>
                    </div>
                    <h4 class="title">See it Live</h4>
                    <a href="" class="theme-btn">Launch Project</a>
                    <p>Project Feedback in 5 star method</p>
                </div>

            </div>
        </div>
    </div>
</section>

<?php get_footer();
