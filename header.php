<?php
include_once 'connect.php';

function base_url() {
    return "http://localhost/theme/";
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Optolens - Fresh Coloured Lens | NEPAL </title>
        <meta name="keywords" content="Optolens Glasses">
        <meta name="description" content="OPTOLENS - Fresh Coloured Contact Lens">
        <meta name="author" content="Optolens">
        <link rel="shortcut icon" href="<?= base_url(); ?>favicon.png">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="<?= base_url(); ?>css/theme.css">
        
        <style>
            #origin-display {overflow: hidden;}
        </style>
        
    </head>
    <body>
        <div id="loader-wrapper">
            <div id="loader">
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
            </div>
        </div>
        <!-- <div class="tt-promo-fixed">
             <button class="tt-btn-close"></button>
             <div class="tt-img">
                 <a href="singleproduct"><img  src="<?= base_url(); ?>images/loader.svg" data-src="<?= base_url(); ?>images/product/product-14.jpg" alt=""></a>
             </div>
             <div class="tt-description">
                 <div class="tt-box-top">
                     <p>
                         Someone purchsed a
                     </p>
                     <p>
                         <a href="<?= base_url(); ?>">
                             Lorem ipsum dolor sit amet conse ctetur adipisicing elit...
                         </a>
                     </p>
                 </div>
                 <div class="tt-info">
                     14 Minutes ago from  New York, USA
                 </div>
             </div>
         </div>-->


        <header>
            <!-- tt-mobile menu -->
            <nav class="panel-menu mobile-main-menu">
                <ul>
                    <li>
                        <a href="<?= base_url(); ?>">HOME</a>
                        <ul>
                            <li>
                                <a href="<?= base_url(); ?>">HOME STYLES</a>
                                <ul>
                                    <li><a href="<?= base_url(); ?>">Home — Example 1 <span class="tt-badge tt-fatured">Popular</span></a></li>
                                    <li><a href="<?= base_url(); ?>index-02.html">Home — Example 2</a></li>
                                    <li><a href="<?= base_url(); ?>index-03.html">Home — Example 3</a></li>
                                    <li><a href="<?= base_url(); ?>index-04.html">Home — Example 4 <span class="tt-badge tt-fatured">Popular</span></a></li>
                                    <li><a href="<?= base_url(); ?>index-05.html">Home — Example 5</a></li>
                                    <li><a href="<?= base_url(); ?>index-06.html">Home — Example 6</a></li>
                                    <li><a href="<?= base_url(); ?>index-07.html">Home — Example 7</a></li>
                                    <li><a href="<?= base_url(); ?>index-08.html">Home — Example 8</a></li>
                                    <li><a href="<?= base_url(); ?>index-09.html">Home — Example 9</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="<?= base_url(); ?>index.html">HOME STYLES</a>
                                <ul>
                                    <li><a href="<?= base_url(); ?>index-10.html">Home — Example 10</a></li>
                                    <li><a href="<?= base_url(); ?>index-11.html">Home — Example 11</a></li>
                                    <li><a href="<?= base_url(); ?>index-12.html">Home — Example 12</a></li>
                                    <li><a href="<?= base_url(); ?>index-13.html">Home — Example 13</a></li>
                                    <li><a href="<?= base_url(); ?>index-14.html">Home — Example 14</a></li>
                                    <li><a href="<?= base_url(); ?>index-15.html">Home — Example 15</a></li>
                                    <li><a href="<?= base_url(); ?>index-16.html">Home — Example 16 <span class="tt-badge tt-fatured">Popular</span></a></li>
                                    <li><a href="<?= base_url(); ?>index-17.html">Home — Example 17</a></li>
                                    <li><a href="<?= base_url(); ?>index-18.html">Home — Example 18</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="<?= base_url(); ?>index.html">HOME SKINS <span class="tt-badge tt-sale">HOT</span></a>
                                <ul>
                                    <li><a href="<?= base_url(); ?>index-skin-snowboards.html">Snowboards Shop <span class="tt-badge tt-fatured">Popular</span></a></li>
                                    <li><a href="<?= base_url(); ?>index-skin-phones.html">Phones Shop <span class="tt-badge tt-fatured">Popular</span></a></li>
                                    <li><a href="<?= base_url(); ?>index-skin-bikes.html">Bikes Shop <span class="tt-badge tt-fatured">Popular</span></a></li>
                                    <li><a href="<?= base_url(); ?>index-skin-lingerie.html">Lingerie Shop</a></li>
                                    <li><a href="<?= base_url(); ?>index-skin-furniture.html">Furniture Shop</a></li>
                                    <li><a href="<?= base_url(); ?>index-skin-books.html">Books Shop <span class="tt-badge tt-new">New</span></a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>listing-left-column.html">SHOP</a>
                        <ul>
                            <li>
                                <a href="<?= base_url(); ?>listing-left-column.html">LISTING STYLES</a>
                                <ul>
                                    <li><a href="<?= base_url(); ?>listing-left-column.html">Listing With Left Sidebar</a></li>
                                    <li><a href="<?= base_url(); ?>listing-right-column.html">Listing With Right Sidebar</a></li>
                                    <li><a href="<?= base_url(); ?>listing-not-sidebar.html">Listing Not Sidebar</a></li>
                                    <li><a href="<?= base_url(); ?>listing-not-sidebar-full-width.html">Listing Not Sidebar Full Width</a></li>
                                    <li><a href="<?= base_url(); ?>listing-metro.html">Listing Metro</a></li>
                                    <li><a href="<?= base_url(); ?>listing-left-column-with-block.html">Listing With Custom HTML Block</a></li>
                                    <li><a href="<?= base_url(); ?>listing-collection.html">Listing Collection</a></li>
                                    <li><a href="<?= base_url(); ?>lookbook.html">Look Book</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="<?= base_url(); ?>product.html">PRODUCT PAGE STYLES</a>
                                <ul>
                                    <li><a href="<?= base_url(); ?>product.html">Product Example 1</a></li>
                                    <li><a href="<?= base_url(); ?>product-02.html">Product Example 2</a></li>
                                    <li><a href="<?= base_url(); ?>product-03.html">Product Example 3</a></li>
                                    <li><a href="<?= base_url(); ?>product-04.html">Product Example 4</a></li>
                                    <li><a href="<?= base_url(); ?>product-variable.html">Product Layout</a></li>
                                    <li><a href="<?= base_url(); ?>product-three-columns.html">Three Columns</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="<?= base_url(); ?>product-variable.html">PRODUCT PAGE TYPES</a>
                                <ul>
                                    <li><a href="<?= base_url(); ?>product.html">Standard Product</a></li>
                                    <li><a href="<?= base_url(); ?>product-variable.html">Variable Product</a></li>
                                    <li><a href="<?= base_url(); ?>product-04.html">Grouped Product</a></li>
                                    <li><a href="<?= base_url(); ?>product-label-new.html">New Product</a></li>
                                    <li><a href="<?= base_url(); ?>product-label-sale.html">Sale Product</a></li>
                                    <li><a href="<?= base_url(); ?>product-label-out-of-stock.html">Out Of Stock Product</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="<?= base_url(); ?>shopping_cart_02.html">OTHER PAGES</a>
                                <ul>
                                    <li><a href="<?= base_url(); ?>shopping_cart_02.html">Cart</a></li>
                                    <li><a href="<?= base_url(); ?>shopping_cart_01.html">Cart With Right Col</a></li>
                                    <li><a href="<?= base_url(); ?>account.html">Account</a></li>
                                    <li><a href="<?= base_url(); ?>account_address.html">Account Address</a></li>
                                    <li><a href="<?= base_url(); ?>account_address_fields.html">Account Address Fields</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>blog-listing-without-col.html">BLOG</a>
                        <ul>
                            <li>
                                <a href="<?= base_url(); ?>blog-listing-without-col.html">BLOG STYLE</a>
                                <ul>
                                    <li><a href="<?= base_url(); ?>blog-listing-without-col.html">Standard Without Sidebar</a></li>
                                    <li><a href="<?= base_url(); ?>blog-listing-col-left.html">Standard With Left Sidebar</a></li>
                                    <li><a href="<?= base_url(); ?>blog-listing-col-right.html">Standard With Right Sidebar</a></li>
                                    <li><a href="<?= base_url(); ?>blog-masonry-col-2.html">Two Colums</a></li>
                                    <li><a href="<?= base_url(); ?>blog-masonry-col-3.html">Three Colums</a></li>
                                    <li><a href="<?= base_url(); ?>blog-masonry-col-3-filter.html">Three Colums With Filter</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="<?= base_url(); ?>blog-single-post.html">POST TYPE</a>
                                <ul>
                                    <li><a href="<?= base_url(); ?>blog-single-post.html">Standard</a></li>
                                    <li><a href="<?= base_url(); ?>blog-single-post-gallery.html">Gallery</a></li>
                                    <li><a href="<?= base_url(); ?>blog-single-post-link.html">Link</a></li>
                                    <li><a href="<?= base_url(); ?>blog-single-post-quote.html">Quote</a></li>
                                    <li><a href="<?= base_url(); ?>blog-single-post-video.html">Video</a></li>
                                    <li><a href="<?= base_url(); ?>blog-single-post-audio.html">Audio</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>portfolio-col-grid-four.html">PORTFOLIO</a>
                        <ul>
                            <li>
                                <a href="<?= base_url(); ?>portfolio-col-grid-four.html">BOXED GRID</a>
                                <ul>
                                    <li><a href="<?= base_url(); ?>portfolio-col-grid-two.html">Two Colums</a></li>
                                    <li><a href="<?= base_url(); ?>portfolio-col-grid-three.html">Three Colums</a></li>
                                    <li><a href="<?= base_url(); ?>portfolio-col-grid-four.html">Four Colums</a></li>
                                    <li><a href="<?= base_url(); ?>portfolio-col-grid-four-without-filter.html">Four Colums Without Filter</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="<?= base_url(); ?>portfolio-col-wide-three.html">BOXED STYLES</a>
                                <ul>
                                    <li><a href="<?= base_url(); ?>portfolio-col-wide-two.html">Two Colums</a></li>
                                    <li><a href="<?= base_url(); ?>portfolio-col-wide-three.html">Three Colums</a></li>
                                    <li><a href="<?= base_url(); ?>portfolio-col-wide-four.html">Four Colums</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>about.html">PAGES</a>
                        <ul>
                            <li><a href="<?= base_url(); ?>about.html">About Example 1</a>
                                <ul>
                                    <li><a href="<?= base_url(); ?>about.html">Link Level 1</a></li>
                                    <li>
                                        <a href="<?= base_url(); ?>about.html">Link Level 1</a>
                                        <ul>
                                            <li><a href="<?= base_url(); ?>about.html">Link Level 2</a></li>
                                            <li>
                                                <a href="<?= base_url(); ?>about.html">Link Level 2</a>
                                                <ul>
                                                    <li><a href="<?= base_url(); ?>about.html">Link Level 3</a></li>
                                                    <li><a href="<?= base_url(); ?>about.html">Link Level 3</a></li>
                                                    <li><a href="<?= base_url(); ?>about.html">Link Level 3</a></li>
                                                    <li>
                                                        <a href="<?= base_url(); ?>about.html">Link Level 3</a>
                                                        <ul>
                                                            <li>
                                                                <a href="<?= base_url(); ?>about.html">Link Level 4</a>
                                                                <ul>
                                                                    <li><a href="<?= base_url(); ?>about.html">Link Level 5</a></li>
                                                                    <li><a href="<?= base_url(); ?>about.html">Link Level 5</a></li>
                                                                    <li><a href="<?= base_url(); ?>about.html">Link Level 5</a></li>
                                                                    <li><a href="<?= base_url(); ?>about.html">Link Level 5</a></li>
                                                                    <li><a href="<?= base_url(); ?>about.html">Link Level 5</a></li>
                                                                </ul>
                                                            </li>
                                                            <li><a href="<?= base_url(); ?>about.html">Link Level 4</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="<?= base_url(); ?>about.html">Link Level 3</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="<?= base_url(); ?>about.html">Link Level 2</a></li>
                                            <li><a href="<?= base_url(); ?>about.html">Link Level 2</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="<?= base_url(); ?>about.html">Link Level 1</a></li>
                                    <li><a href="<?= base_url(); ?>about.html">Link Level 1</a></li>
                                    <li><a href="<?= base_url(); ?>about.html">Link Level 1</a></li>
                                </ul>
                            </li>
                            <li><a href="<?= base_url(); ?>about-02.html">About Example 2</a></li>
                            <li><a href="<?= base_url(); ?>contact.html">Contacts Example 1</a></li>
                            <li><a href="<?= base_url(); ?>contact-02.html">Contacts Example 2</a></li>
                            <li><a href="<?= base_url(); ?>services.html">Services</a></li>
                            <li><a href="<?= base_url(); ?>faq.html">FAQ</a></li>
                            <li><a href="<?= base_url(); ?>coming-soon.html">Coming Soon</a></li>
                            <li><a href="<?= base_url(); ?>page404.html">Page 404</a></li>
                            <li><a href="<?= base_url(); ?>typography.html">Typography</a></li>
                            <li><a href="<?= base_url(); ?>gift-cart.html">Gift Cart</a></li>
                            <li>
                                <a href="<?= base_url(); ?>compare.html">Compare</a>
                                <ul>
                                    <li><a href="<?= base_url(); ?>compare.html">Compare 01</a></li>
                                    <li><a href="<?= base_url(); ?>compare-02.html">Compare 02</a></li>
                                </ul>
                            </li>
                            <li><a href="<?= base_url(); ?>wishlist.html">Wishlist</a></li>
                            <li>
                                <a href="<?= base_url(); ?>empty-search.html">Empty</a>
                                <ul>
                                    <li><a href="<?= base_url(); ?>empty-cart.html">Empty Cart</a></li>
                                    <li><a href="<?= base_url(); ?>empty-search.html">Empty Search</a></li>
                                    <li><a href="<?= base_url(); ?>empty-wishlist.html">Empty Wishlist</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>listing-left-column.html">WOMEN</a>
                        <ul>
                            <li>
                                <a href="<?= base_url(); ?>listing-left-column.html">TOPS</a>
                                <ul>
                                    <li><a href="<?= base_url(); ?>listing-left-column.html">Blouses &amp; Shirts</a></li>
                                    <li><a href="<?= base_url(); ?>listing-left-column.html">Dresses <span class="tt-badge tt-new">New</span></a></li>
                                    <li>
                                        <a href="<?= base_url(); ?>listing-left-column.html">Tops &amp; T-shirts</a>
                                        <ul>
                                            <li><a href="<?= base_url(); ?>listing-left-column.html">Link Level 1</a></li>
                                            <li>
                                                <a href="<?= base_url(); ?>listing-left-column.html">Link Level 1</a>
                                                <ul>
                                                    <li><a href="<?= base_url(); ?>listing-left-column.html">Link Level 2</a></li>
                                                    <li>
                                                        <a href="<?= base_url(); ?>listing-left-column.html">Link Level 2</a>
                                                        <ul>
                                                            <li><a href="<?= base_url(); ?>listing-left-column.html">Link Level 3</a></li>
                                                            <li><a href="<?= base_url(); ?>listing-left-column.html">Link Level 3</a></li>
                                                            <li><a href="<?= base_url(); ?>listing-left-column.html">Link Level 3</a></li>
                                                            <li>
                                                                <a href="<?= base_url(); ?>listing-left-column.html">Link Level 3</a>
                                                                <ul>
                                                                    <li>
                                                                        <a href="<?= base_url(); ?>listing-left-column.html">Link Level 4</a>
                                                                        <ul>
                                                                            <li><a href="<?= base_url(); ?>listing-left-column.html">Link Level 5</a></li>
                                                                            <li><a href="<?= base_url(); ?>listing-left-column.html">Link Level 5</a></li>
                                                                            <li><a href="<?= base_url(); ?>listing-left-column.html">Link Level 5</a></li>
                                                                            <li><a href="<?= base_url(); ?>listing-left-column.html">Link Level 5</a></li>
                                                                            <li><a href="<?= base_url(); ?>listing-left-column.html">Link Level 5</a></li>
                                                                        </ul>
                                                                    </li>
                                                                    <li><a href="<?= base_url(); ?>listing-left-column.html">Link Level 4</a></li>
                                                                    <li><a href="<?= base_url(); ?>listing-left-column.html">Link Level 4</a></li>
                                                                    <li><a href="<?= base_url(); ?>listing-left-column.html">Link Level 4</a></li>
                                                                    <li><a href="<?= base_url(); ?>listing-left-column.html">Link Level 4</a></li>
                                                                </ul>
                                                            </li>
                                                            <li><a href="<?= base_url(); ?>listing-left-column.html">Link Level 3</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="<?= base_url(); ?>listing-left-column.html">Link Level 2</a></li>
                                                    <li><a href="<?= base_url(); ?>listing-left-column.html">Link Level 2</a></li>
                                                    <li><a href="<?= base_url(); ?>listing-left-column.html">Link Level 2</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="<?= base_url(); ?>listing-left-column.html">Link Level 1</a></li>
                                            <li><a href="<?= base_url(); ?>listing-left-column.html">Link Level 1</a></li>
                                            <li><a href="<?= base_url(); ?>listing-left-column.html">Link Level 1</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="<?= base_url(); ?>listing-left-column.html">Sleeveless Tops</a></li>
                                    <li><a href="<?= base_url(); ?>listing-left-column.html">Sweaters</a></li>
                                    <li><a href="<?= base_url(); ?>listing-left-column.html">Jackets</a></li>
                                    <li><a href="<?= base_url(); ?>listing-left-column.html">Outerwear</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="<?= base_url(); ?>listing-left-column.html">BOTTOMS</a>
                                <ul>
                                    <li><a href="<?= base_url(); ?>listing-left-column.html">Trousers <span class="tt-badge tt-fatured">Fatured</span></a></li>
                                    <li><a href="<?= base_url(); ?>listing-left-column.html">Jeans</a></li>
                                    <li><a href="<?= base_url(); ?>listing-left-column.html">Leggings</a></li>
                                    <li><a href="<?= base_url(); ?>listing-left-column.html">Jumpsuit &amp; Shorts</a></li>
                                    <li><a href="<?= base_url(); ?>listing-left-column.html">Skirts</a></li>
                                    <li><a href="<?= base_url(); ?>listing-left-column.html">Tights</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="<?= base_url(); ?>listing-left-column.html">ACCESSORIES</a>
                                <ul>
                                    <li><a href="<?= base_url(); ?>listing-left-column.html">Jewellery</a></li>
                                    <li><a href="<?= base_url(); ?>listing-left-column.html">Hats</a></li>
                                    <li><a href="<?= base_url(); ?>listing-left-column.html">Scarves &amp; Snoods</a></li>
                                    <li><a href="<?= base_url(); ?>listing-left-column.html">Belts</a></li>
                                    <li><a href="<?= base_url(); ?>listing-left-column.html">Bags</a></li>
                                    <li><a href="<?= base_url(); ?>listing-left-column.html">Shoes</a></li>
                                    <li><a href="<?= base_url(); ?>listing-left-column.html">Sunglasses <span class="tt-badge tt-sale">Sale 15%</span></a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="<?= base_url(); ?>listing-left-column.html">SPECIALS</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>listing-right-column.html">MEN</a>
                        <ul>
                            <li>
                                <a href="<?= base_url(); ?>listing-right-column.html">TOPS</a>
                                <ul>
                                    <li><a href="<?= base_url(); ?>listing-right-column.html">Blouses &amp; Shirts</a></li>
                                    <li><a href="<?= base_url(); ?>listing-right-column.html">Dresses <span class="tt-badge tt-new">New</span></a></li>
                                    <li>
                                        <a href="<?= base_url(); ?>listing-right-column.html">Tops &amp; T-shirts</a>
                                        <ul>
                                            <li><a href="<?= base_url(); ?>listing-right-column.html">Link Level 1</a></li>
                                            <li>
                                                <a href="<?= base_url(); ?>listing-right-column.html">Link Level 1</a>
                                                <ul>
                                                    <li><a href="<?= base_url(); ?>listing-right-column.html">Link Level 2</a></li>
                                                    <li>
                                                        <a href="<?= base_url(); ?>listing-right-column.html">Link Level 2</a>
                                                        <ul>
                                                            <li><a href="<?= base_url(); ?>listing-right-column.html">Link Level 3</a></li>
                                                            <li><a href="<?= base_url(); ?>listing-right-column.html">Link Level 3</a></li>
                                                            <li><a href="<?= base_url(); ?>listing-right-column.html">Link Level 3</a></li>
                                                            <li>
                                                                <a href="<?= base_url(); ?>listing-right-column.html">Link Level 3</a>
                                                                <ul>
                                                                    <li>
                                                                        <a href="<?= base_url(); ?>listing-right-column.html">Link Level 4</a>
                                                                        <ul>
                                                                            <li><a href="<?= base_url(); ?>listing-right-column.html">Link Level 5</a></li>
                                                                            <li><a href="<?= base_url(); ?>listing-right-column.html">Link Level 5</a></li>
                                                                            <li><a href="<?= base_url(); ?>listing-right-column.html">Link Level 5</a></li>
                                                                            <li><a href="<?= base_url(); ?>listing-right-column.html">Link Level 5</a></li>
                                                                            <li><a href="<?= base_url(); ?>listing-right-column.html">Link Level 5</a></li>
                                                                        </ul>
                                                                    </li>
                                                                    <li><a href="<?= base_url(); ?>listing-right-column.html">Link Level 4</a></li>
                                                                    <li><a href="<?= base_url(); ?>listing-right-column.html">Link Level 4</a></li>
                                                                    <li><a href="<?= base_url(); ?>listing-right-column.html">Link Level 4</a></li>
                                                                    <li><a href="<?= base_url(); ?>listing-right-column.html">Link Level 4</a></li>
                                                                </ul>
                                                            </li>
                                                            <li><a href="<?= base_url(); ?>listing-right-column.html">Link Level 3</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="<?= base_url(); ?>listing-right-column.html">Link Level 2</a></li>
                                                    <li><a href="<?= base_url(); ?>listing-right-column.html">Link Level 2</a></li>
                                                    <li><a href="<?= base_url(); ?>listing-right-column.html">Link Level 2</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="<?= base_url(); ?>listing-right-column.html">Link Level 1</a></li>
                                            <li><a href="<?= base_url(); ?>listing-right-column.html">Link Level 1</a></li>
                                            <li><a href="<?= base_url(); ?>listing-right-column.html">Link Level 1</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="<?= base_url(); ?>listing-right-column.html">Sleeveless Tops</a></li>
                                    <li><a href="<?= base_url(); ?>listing-right-column.html">Sweaters</a></li>
                                    <li><a href="<?= base_url(); ?>listing-right-column.html">Jackets</a></li>
                                    <li><a href="<?= base_url(); ?>listing-right-column.html">Outerwear</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="<?= base_url(); ?>listing-right-column.html">BOTTOMS</a>
                                <ul>
                                    <li><a href="<?= base_url(); ?>listing-right-column.html">Trousers <span class="tt-badge tt-fatured">Fatured</span></a></li>
                                    <li><a href="<?= base_url(); ?>listing-right-column.html">Jeans</a></li>
                                    <li><a href="<?= base_url(); ?>listing-right-column.html">Leggings</a></li>
                                    <li><a href="<?= base_url(); ?>listing-right-column.html">Jumpsuit &amp; shorts</a></li>
                                    <li><a href="<?= base_url(); ?>listing-right-column.html">Skirts</a></li>
                                    <li><a href="<?= base_url(); ?>listing-right-column.html">Tights</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="<?= base_url(); ?>listing-right-column.html">ACCESSORIES</a>
                                <ul>
                                    <li><a href="<?= base_url(); ?>listing-right-column.html">Jewellery</a></li>
                                    <li><a href="<?= base_url(); ?>listing-right-column.html">Hats</a></li>
                                    <li><a href="<?= base_url(); ?>listing-right-column.html">Scarves &amp; Snoods</a></li>
                                    <li><a href="<?= base_url(); ?>listing-right-column.html">Belts</a></li>
                                    <li><a href="<?= base_url(); ?>listing-right-column.html">Bags</a></li>
                                    <li><a href="<?= base_url(); ?>listing-right-column.html">Shoes</a></li>
                                    <li><a href="<?= base_url(); ?>listing-right-column.html">Sunglasses <span class="tt-badge tt-sale">Sale 15%</span></a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="<?= base_url(); ?>index-rtl.html">RTL</a></li>
                </ul>
                <div class="mm-navbtn-names">
                    <div class="mm-closebtn">Close</div>
                    <div class="mm-backbtn">Back</div>
                </div>
            </nav>
            <!-- tt-mobile-header -->
            <div class="tt-mobile-header">
                <div class="container-fluid">
                    <div class="tt-header-row">
                        <div class="tt-mobile-parent-menu">
                            <div class="tt-menu-toggle">
                                <i class="icon-03"></i>
                            </div>
                        </div>
                        <!-- search -->
                        <div class="tt-mobile-parent-search tt-parent-box"></div>
                        <!-- /search -->
                        <!-- cart -->
                        <div class="tt-mobile-parent-cart tt-parent-box"></div>
                        <!-- /cart -->
                        <!-- account -->
                        <div class="tt-mobile-parent-account tt-parent-box"></div>
                        <!-- /account -->
                        <!-- currency -->
                        <div class="tt-mobile-parent-multi tt-parent-box"></div>
                        <!-- /currency -->
                    </div>
                </div>
                <div class="container-fluid tt-top-line">
                    <div class="row">
                        <div class="tt-logo-container">
                            <!-- mobile logo -->
                            <a class="tt-logo tt-logo-alignment" href="<?= base_url(); ?>"><img src="<?= base_url(); ?>images/custom/logo2.jpg" alt="Optolens Nepal" ></a>
                            <!-- /mobile logo -->
                        </div>
                    </div>
                </div>
            </div>



            <!-- tt-desktop-header -->
            <div class="tt-desktop-header tt-color-scheme-02">
                <div class="container">
                    <div class="tt-header-holder ">
                        <div class="tt-col-obj tt-obj-logo">
                            <!-- logo -->
                            <a class="tt-logo tt-logo-alignment" href="<?= base_url(); ?>"><img src="<?= base_url(); ?>images/custom/logo2.jpg" alt="Optolens Nepal" width="180px" height="auto"></a>
                            <!-- /logo -->
                        </div>

                        <div class="tt-col-obj tt-obj-menu">
                            <!-- tt-menu -->
                            <div class="tt-desctop-parent-menu tt-parent-box">
                                <div class="tt-desctop-menu">
                                    <nav>
                                        <ul>
                                            <?php
                                            $res = mysqli_query($connection, "SELECT * FROM category ORDER BY CatID ASC");
                                            while ($row = mysqli_fetch_array($res)) {
                                                ?>
                                                <li class="dropdown tt-megamenu-col-01">
                                                    <a href="<?php echo $row['pages']; ?>"><?php echo strtoupper($row['CategoryName']); ?></a>
                                                    <div class="dropdown-menu">
                                                        <div class="row tt-col-list">
                                                            <?php
                                                            $res_pro = mysqli_query($connection, "SELECT * FROM subcategory WHERE ParentCatID=" . $row['CatID']);
                                                            ?>
                                                            <div class="col">
                                                                <h6 class="tt-title-submenu"><a href=""></a></h6>
                                                                <ul class="tt-megamenu-submenu">				
                                                                    <?php
                                                                    while ($pro_row = mysqli_fetch_array($res_pro)) {
                                                                        ?>
                                                                        <li class="dropdown">
                                                                            <a href="<?php echo $pro_row['SID']; ?>"><?php echo ucwords($pro_row['SubCategoryName']); ?></a>

                                                                        </li>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>	
                                                <?php
                                            }
                                            ?>

                                            
                                            <li class="dropdown tt-megamenu-col-02 "><a href="faq">FAQ</a></li>
                                            <li class="dropdown">
                                                <a href="contact">CONTACT US</a>
                                            </li>
                                        </ul> 
                                    </nav>
                                </div>
                            </div>
                            <!-- /tt-menu -->
                        </div>

                        <div class="tt-col-obj tt-obj-options obj-move-right">

                            <!-- tt-search -->
                            <div class="tt-desctop-parent-search tt-parent-box">
                                <div class="tt-search tt-dropdown-obj">
                                    <button class="tt-dropdown-toggle" data-tooltip="Search" data-tposition="bottom">
                                        <i class="icon-f-85"></i>
                                    </button>
                                    <div class="tt-dropdown-menu">
                                        <div class="container">
                                            <form>
                                                <div class="tt-col">
                                                    <input type="text" class="tt-search-input" placeholder="Search Products...">
                                                    <button class="tt-btn-search" type="submit"></button>
                                                </div>
                                                <div class="tt-col">
                                                    <button class="tt-btn-close icon-g-80"></button>
                                                </div>
                                                <div class="tt-info-text">
                                                    What are you Looking for?
                                                </div>
                                                <div class="search-results">
                                                    <ul>
                                                        <li>
                                                            <a href="singleproduct">
                                                                <div class="thumbnail"><img src="<?= base_url(); ?>images/loader.svg" data-src="<?= base_url(); ?>images/product/product-03.jpg" alt=""></div>
                                                                <div class="tt-description">
                                                                    <div class="tt-title">Flared Shift Bag</div>
                                                                    <div class="tt-price">
                                                                        <span class="new-price">$14</span>
                                                                        <span class="old-price">$24</span>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="singleproduct">
                                                                <div class="thumbnail"><img src="<?= base_url(); ?>images/loader.svg" data-src="<?= base_url(); ?>images/product/product-02.jpg" alt=""></div>
                                                                <div class="tt-description">
                                                                    <div class="tt-title">Flared Shift Bag</div>
                                                                    <div class="tt-price">
                                                                        $24
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="singleproduct">
                                                                <div class="thumbnail"><img src="<?= base_url(); ?>images/loader.svg" data-src="<?= base_url(); ?>images/product/product-01.jpg" alt=""></div>
                                                                <div class="tt-description">
                                                                    <div class="tt-title">Flared Shift Bag</div>
                                                                    <div class="tt-price">
                                                                        $14
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="singleproduct">
                                                                <div class="thumbnail"><img src="<?= base_url(); ?>images/loader.svg" data-src="<?= base_url(); ?>images/product/product-04.jpg" alt=""></div>
                                                                <div class="tt-description">
                                                                    <div class="tt-title">Flared Shift Bag</div>
                                                                    <div class="tt-price">
                                                                        $24
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="singleproduct">
                                                                <div class="thumbnail"><img src="<?= base_url(); ?>images/loader.svg" data-src="<?= base_url(); ?>images/product/product-05.jpg" alt=""></div>
                                                                <div class="tt-description">
                                                                    <div class="tt-title">Flared Shift Bag</div>
                                                                    <div class="tt-price">
                                                                        $17
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="singleproduct">
                                                                <div class="thumbnail"><img src="<?= base_url(); ?>images/loader.svg" data-src="<?= base_url(); ?>images/product/product-06.jpg" alt=""></div>
                                                                <div class="tt-description">
                                                                    <div class="tt-title">Flared Shift Bag</div>
                                                                    <div class="tt-price">
                                                                        $20
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <button type="button" class="tt-view-all">View all products</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /tt-search -->



                            <!-- tt-account -->
                            <div class="tt-desctop-parent-account tt-parent-box">
                                <div class="tt-account tt-dropdown-obj">
                                    <button class="tt-dropdown-toggle"  data-tooltip="My Account" data-tposition="bottom"><i class="icon-f-94"></i></button>
                                    <div class="tt-dropdown-menu">
                                        <div class="tt-mobile-add">
                                            <button class="tt-close">Close</button>
                                        </div>
                                        <div class="tt-dropdown-inner">
                                            <ul>
                                                <li><a href="login"><i class="icon-f-76"></i>Sign In</a></li>
                                                <li><a href="register"><i class="icon-f-94"></i>Register</a></li>
                                                <li><a href="wishlist"><i class="icon-n-072"></i>Wishlist</a></li>
                                                <li><a href="emptywishlist"><i class="icon-n-072"></i>Empty Wishlist</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /tt-account -->


                            <!-- tt-cart -->
                            <div class="tt-desctop-parent-cart tt-parent-box">
                                <div class="tt-cart tt-dropdown-obj" data-tooltip="Cart" data-tposition="bottom">
                                    <button class="tt-dropdown-toggle">
                                        <i class="icon-f-39"></i>
                                        <span class="tt-badge-cart">3</span>
                                    </button>
                                    <div class="tt-dropdown-menu">
                                        <div class="tt-mobile-add">
                                            <h6 class="tt-title">SHOPPING CART</h6>
                                            <button class="tt-close">Close</button>
                                        </div>
                                        <div class="tt-dropdown-inner">
                                            <div class="tt-cart-layout">
                                                <!-- layout emty cart -->
                                                <a href="emptycart" class="tt-cart-empty">
                                                    <i class="icon-f-39"></i>
                                                    <p>No Products in the Cart</p>
                                                </a> 
                                                <div class="tt-cart-content">
                                                    <div class="tt-cart-list">
                                                        <div class="tt-item">
                                                            <a href="singleproduct">
                                                                <div class="tt-item-img">
                                                                    <img src="<?= base_url(); ?>images/loader.svg" data-src="<?= base_url(); ?>images/product/product-01.jpg" alt="">
                                                                </div>
                                                                <div class="tt-item-descriptions">
                                                                    <h2 class="tt-title">Flared Shift Dress</h2>
                                                                    <ul class="tt-add-info">
                                                                        <li>Yellow, Material 2, Size 58,</li>
                                                                        <li>Vendor: Addidas</li>
                                                                    </ul>
                                                                    <div class="tt-quantity">1 X</div> <div class="tt-price">$12</div>
                                                                </div>
                                                            </a>
                                                            <div class="tt-item-close">
                                                                <a href="#" class="tt-btn-close"></a>
                                                            </div>
                                                        </div>
                                                        <div class="tt-item">
                                                            <a href="singleproduct">
                                                                <div class="tt-item-img">
                                                                    <img src="<?= base_url(); ?>images/loader.svg" data-src="<?= base_url(); ?>images/product/product-02.jpg" alt="">
                                                                </div>
                                                                <div class="tt-item-descriptions">
                                                                    <h2 class="tt-title">Flared Shift Dress</h2>
                                                                    <ul class="tt-add-info">
                                                                        <li>Yellow, Material 2, Size 58,</li>
                                                                        <li>Vendor: Addidas</li>
                                                                    </ul>
                                                                    <div class="tt-quantity">1 X</div> <div class="tt-price">$18</div>
                                                                </div>
                                                            </a>
                                                            <div class="tt-item-close">
                                                                <a href="#" class="tt-btn-close"></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tt-cart-total-row">
                                                        <div class="tt-cart-total-title">SUBTOTAL:</div>
                                                        <div class="tt-cart-total-price">$324</div>
                                                    </div>
                                                    <div class="tt-cart-btn">
                                                        <div class="tt-item">
                                                            <a href="#" class="btn">PROCEED TO CHECKOUT</a>
                                                        </div>
                                                        <div class="tt-item">
                                                            <a href="cartitems" class="btn-link-02 tt-hidden-mobile">View Cart</a>
                                                            <a href="cartitems" class="btn btn-border tt-hidden-desctope">VIEW CART</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /tt-cart -->

                        </div>
                    </div>
                </div>
            </div>


            <!-- stuck nav -->
            <div class="tt-stuck-nav">
                <div class="container">
                    <div class="tt-header-row ">
                        <div class="tt-stuck-parent-menu"></div>
                        <div class="tt-stuck-parent-search tt-parent-box"></div>
                        <div class="tt-stuck-parent-cart tt-parent-box"></div>
                        <div class="tt-stuck-parent-account tt-parent-box"></div>
                        <div class="tt-stuck-parent-multi tt-parent-box"></div>
                    </div>
                </div>
            </div>


        </header>