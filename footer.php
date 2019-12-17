<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

$the_theme = wp_get_theme();

$footer_blurb = get_field('footer_blurb', 'footer');
?>

<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <a id="site-logo" class="navbar-brand footer-brand" href="<?php echo network_home_url(); ?>">
                    Revelian
                </a>
                <?php echo $footer_blurb; ?>
            </div>
            <div class="col-md-2 offset-md-1">
                <p class="footer-title">Explore</p>
                <?php wp_nav_menu(
						array(
							'theme_location'  => 'footer',
							'container_class' => 'navbar__navigation navbar__navigation--footer',
							'container_id'    => 'navbarNavDropdown',
							'menu_class'      => 'navbar-nav',
							'fallback_cb'     => '',
							'menu_id'         => 'main-menu',
							'walker'          => new understrap_WP_Bootstrap_Navwalker(),
						)
					); ?>
            </div>
            <div class="col-md-3 offset-md-1 ">
                <p class="footer-title">Connect with Revelian</p>

                <?php wp_nav_menu(
						array(
							'theme_location'  => 'footer-social',
							'container_class' => 'navbar__navigation navbar__navigation--footer',
							'container_id'    => 'navbarNavDropdown',
							'menu_class'      => 'navbar-nav',
							'fallback_cb'     => '',
							'menu_id'         => 'secondary-menu',
							'walker'          => new understrap_WP_Bootstrap_Navwalker(),
						)
					); ?>
            </div>
        </div>
    </div>
</footer>

<div id="myOverlay" class="overlay">
    <span class="closebtn" onclick="closeSearch()" title="Close Overlay"><i class="fal fa-times"></i></span>
    <div class="overlay-content">
        <form method="get" autocomplete="off" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>"
            role="search">
            <input class="full-page-search-input field" id="s" name="s" type="text"
                placeholder="<?php esc_attr_e( 'Search &hellip;', 'understrap' ); ?>"
                value="<?php the_search_query(); ?>">
        </form>
    </div>
</div>

<style>


</style>

<script>

</script>


</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-3.1.1.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/flickity.min.js" defer></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/fontawesome-all.js" defer></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/parallax.js" defer></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/mixitup.js" defer></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/scripts.js" defer></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/countUp.js" defer></script>

<script src="<?php echo get_template_directory_uri(); ?>/js/search.js" defer></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/navbaranimation.js" defer></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/blur.js" defer></script>

<script src="<?php echo get_template_directory_uri(); ?>/js/fuse.min.js" defer></script>



<script src="<?php echo get_template_directory_uri(); ?>/js/owl.carousel.js" defer></script>


<script>
var tl = new TimelineLite();

var menuItems = document.querySelector('#main-menu').children;

for (i = 0; i < menuItems.length; i++) {
    menuItems[i].addEventListener("click", (e) => {
        e.preventDefault();
        var mega_menu = document.querySelectorAll('.mega_menu');
        if (e.target)
            for (i = 0; i < mega_menu.length; i++) {
                //mega_menu[i].classList.remove('active');
                tl.to(mega_menu[i], 0.3, {
                    top: 20,
                    opacity: 0,
                    zIndex: '-1',
                    display: '',
                    width: '100%',
                    height: '100%',
                    padding: 50,
                });
            }

        //document.getElementById('dropdown').classList.add('active');
        if (e.target.title.split(' ').length > 1) {
            var string = "";
            for (i = 0; i < e.target.title.split(' ').length; i++) {
                string += '-' + e.target.title.split(' ')[i];
            }
            var menu = document.querySelector('[data-menu=' + string + ']');
        } else {
            var menu = document.querySelector('[data-menu=' + e.target.title + ']');
        }
        var line = document.querySelector('.navbar__mega--line');

        tl.to(line, 0.3, {
            width: '100%',
            left: 0,
            x: '0:'
        }, '-=0.3');

        if (e.target.title != null) {
            if (menu != null) {
                tl.to(menu, 0.3, {
                    top: 0,
                    opacity: 1,
                    zIndex: 2,
                    display: 'flex',
                    width: '100%',
                    padding: 50,
                    height: '100%'
                }, '-=0.2');
            } else {
                window.location.href = e.target;
            }
        }
        tl.add(() => {
            tl.to(document.getElementById('dropdown'), 0.3, {
                height: 'auto',
                borderTop: '2px solid #fff',
            }, '-=0.1')
        })

    });

};

document.addEventListener("click", (e) => {
    if (e.target.classList.contains('nav-link') || document.getElementById('dropdown').contains(e.target)) {

    } else {
        //document.getElementById('dropdown').classList.remove('active');

        var menu = document.querySelectorAll('.mega_menu');
        for (i = 0; i < menu.length; i++) {
            tl.to(menu[i], 0.3, {
                top: 20,
                opacity: 0,
                display: 'none',
                zIndex: -2,
                width: '100%'
            });
        }

        tl.to(document.getElementById('dropdown'), 0.3, {
            height: 0,
            borderTop: '0px solid #fff',
        }, '-=0.3')

        tl.to(document.querySelector('.navbar__mega--line'), 0.3, {
            width: '0%',
            left: '50%',
            x: '0%'
        }, '-=0.2');
    }
});


var toggler = document.querySelector('[data-toggle="menu"]');
$(toggler).click(function() {
    toggleMenu(toggler)
});
</script>
<script>
function toggleMenu(toggler) {
    var classList = document.getElementById('expanding-nav').classList;
    if (classList.contains('active-menu')) {
        classList.remove('active-menu')
        document.querySelector('#page').style.display = 'block';

        $('.burger__container').toggleClass('active');
    } else {
        classList.add('active-menu');
        document.querySelector('#page').style.display = 'none';
        $('.burger__container').toggleClass('active');
    }
}

window.FontAwesomeConfig = {
    searchPseudoElements: true
}
</script>

<?php
	$page_title = get_the_title( get_option('page_for_posts', true) );

if($page_title == "Blog"): ?>

<script>
$(document).ready(function() {
    $(".owl-carousel").owlCarousel({
        loop: true,
        nav: true,
        dots: true,
        items: 1,
        singleItem: true,
        autoHeight: true,
        navText: ['<i class="fal fa-chevron-left"></i>', '<i class="fal fa-chevron-right"></i>']
    });
});
</script>
<?php else: ?>
<script>
$(document).ready(function() {
    $(".owl-carousel").owlCarousel({
        items: 1,
        loop: true,
        nav: true,
        dots: false,
        navText: ['<i class="fal fa-chevron-left"></i>', '<i class="fal fa-chevron-right"></i>']
    });
    var a = new TweenLite(".fa-search", 0.6, {
        opacity: 1,
        delay: 0.6,
    })
});
</script>
<?php endif; ?>


<script>
var headingNode = document.querySelector('.headingtext');
if (headingNode) {
    if (headingNode.firstChild != null && window.innerWidth >= '768') {
        var text = headingNode.firstChild.nodeValue;

        if (typeof text !== "undefined") {
            textArray = text.split(" ");
            var newString = "";

            newString += textArray[0];
            if (textArray.length > 1) {
                for (var i = 1; i < textArray.length - 1; i++) {
                    newString += ' ' + textArray[i];
                }
                newString += '\xA0' + textArray[textArray.length - 1];

            } else {
                newStrng += textArray[0];
            }
        }

        headingNode.firstChild.nodeValue = newString;

    }
}
</script>

<script>
var name = '<?php echo get_bloginfo('name'); ?>';
var array = name.split(" ");
subsite = array[array.length - 1];
console.log(subsite);
if (subsite === 'Employer') {
    subsite = 'For employers';
} else if (subsite === 'Jobseeker') {
    subsite = 'For jobseekers';
} else {
    subsite = 'Home';
}

document.querySelector('#dropdownMenuLink').innerHTML = subsite;
</script>


</body>

</html>