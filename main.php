<?php
/**
 * DokuWiki Clean Template
 *
 * @link     FIXME 
 * @author   FIXME 
 * @license  FIXME 
 */

// error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE); ini_set('display_errors', '1');  // Switch on for error reporting

if (!defined('DOKU_INC')) die(); /* must be run from within DokuWiki */
@require_once(dirname(__FILE__).'/tpl_functions.php'); /* include hook for template functions */
?>
<!DOCTYPE html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if IE 9]>    <html class="no-js ie9" lang="en"> <![endif]-->
<!-- Consider adding an manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en" itemscope="" itemtype="http://schema.org/Product"> <!--<![endif]-->
<html
    xmlns="http://www.w3.org/1999/xhtml"
    xml:lang="<?php echo $conf['lang']?>"
    lang="<?php echo $conf['lang']?>"
    dir="<?php echo $lang['direction']?>">
    <head>
        <title><?php tpl_pagetitle()?> - <?php echo hsc($conf['title'])?></title>
        <meta charset="utf-8">

        <!-- Use the .htaccess and remove these lines to avoid edge case issues.
                         More info: h5bp.com/b/378 -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="humans.txt">

        <link rel="shortcut icon" href="favicon.png" type="image/x-icon">

        <!-- Facebook Metadata /-->
        <meta property="fb:page_id" content="">
        <meta property="og:image" content="">
        <meta property="og:description" content="">
        <meta property="og:title" content="">

        <!-- Google+ Metadata /-->
        <meta itemprop="name" content="">
        <meta itemprop="description" content="">
        <meta itemprop="image" content="">

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">

        <?php tpl_metaheaders()?>

        <script src="<?php echo tpl_basedir()?>bower_components/gumby/js/libs/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
        <div class="dokuwiki">
            <div class="navcontain">
                <nav class="navbar" gumby-fixed="top" id="wiki__nav">
                    <a class="toggle" gumby-trigger="#wiki__nav > .row > ul" href="#"><i class="icon-menu"></i></a>
                    <div class="row">
                        <h3 class="five columns logo" id="nav__logo">
                            <a href=<?php echo wl()?>><?php echo hsc($conf['title'])?></a>
                        </h3>
                        <ul class="seven columns" id="nav__menu">
                            <li><a href="#">Wikitools</a>
                                <div class="dropdown">
                                    <ul>
                                        <li><?php tpl_actionlink('recent')?></li>
                                        <li><?php tpl_actionlink('profile')?></li>
                                        <li><?php tpl_actionlink('login')?></li>
                                        <li><?php tpl_actionlink('admin')?></li>
                                        <li><?php tpl_actionlink('index')?></li>
                                    </ul>
                                </div>
                            </li>
                            <li><a href="#">Pagetools</a>
                                <div class="dropdown">
                                    <ul>
                                        <li><?php tpl_actionlink('edit')?></li>
                                        <li><?php tpl_actionlink('history')?></li>
                                        <li><?php tpl_link(wl($ID,'do=backlink'),"Backlinks")?></li>
                                        <li><?php tpl_actionlink('subscribe')?></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="field">
                                <?php _tpl_draw_searchform()?>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="row">
                <?php html_msgarea()?>
            </div>
            <div class="row" id="status__bar">
                <?php if ($conf['breadcrumbs']) { tpl_breadcrumbs(); } ?>
                <?php if ($conf['youarehere']) { tpl_youarehere(); } ?>
            </div>
            <div class="row">
<?php
// render the content into buffer for later use
ob_start();
tpl_content(false);
$buffer = ob_get_clean();
?>

                <div class="three columns" id="dokuwiki__sidebar">
                        <div class="row" id="toc__container">
                            <hr>
                            <h4 class="toggle" gumby-trigger="#dw__toc" style="cursor:pointer" id="toc__header"><?php echo $lang['toc']?>
                                <i class="icon-right-open"></i>
                            </h4>
                            <?php tpl_toc()?>
                            <hr>
                        </div>
                        <div class="row hide-on-phones" gumby-fixed="top" gumby-top="60" gumby-offset="60" style="text-align: center;">
                                <a href="#" class="skip" gumby-goto="top" gumby-duration="600"><i class="icon icon-up-open-mini"></i><?php echo $lang['btn_top']?><i class="icon icon-up-open-mini"></i></a>
                        </div>
                </div> 
                <div class="nine columns" id="dokuwiki__content">
                    <?php echo $buffer?>
                    <div class="row" id="page__info">
                        <?php tpl_userinfo()?> – <?php tpl_pageinfo()?>
                    </div>
                </div> 
            </div>
            <?php tpl_indexerWebBug(); ?>
        </div>
    </body>
</html>
