<?php
$gallery = $data->dataQuery($conn,"SELECT * FROM galery WHERE status = '1' ORDER BY no DESC");
//$url = "?page=Gallery";
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php include_once "content_header.php";?>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-solid bg-black">
        <div class="p-3  pb-0">
            <div class="masonry">
            <?php
            foreach($gallery as $gambar)
                echo<<<_END
            <div class="item">    
            <a class="">
            <img class="img img-gallery" src="$gambar[gambar]">
            </a>
            </div>
_END;
                ?>
<!--
            <a class="demo-gallery__img--main post-isi">
            <img class="img img-gallery" src="./dist/img/avatar2.png">
            </a>
            <a class="demo-gallery__img--main post-isi">
            <img class="img img-gallery" src="./dist/img/avatar04.png">
            </a>
-->
            </div>
        <!-- Root element of PhotoSwipe. Must have class pswp. -->
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

    <!-- Background of PhotoSwipe. 
         It's a separate element as animating opacity is faster than rgba(). -->
    <div class="pswp__bg"></div>

    <!-- Slides wrapper with overflow:hidden. -->
    <div class="pswp__scroll-wrap">

        <!-- Container that holds slides. 
            PhotoSwipe keeps only 3 of them in the DOM to save memory.
            Don't modify these 3 pswp__item elements, data is added later on. -->
        <div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>

        <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
        <div class="pswp__ui pswp__ui--hidden">

            <div class="pswp__top-bar">

                <!--  Controls are self-explanatory. Order can be changed. -->

                <div class="pswp__counter"></div>

                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

                <button class="pswp__button pswp__button--share" title="Share"></button>

                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                <!-- Preloader demo https://codepen.io/dimsemenov/pen/yyBWoR -->
                <!-- element will get class pswp__preloader--active when preloader is running -->
                <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                      <div class="pswp__preloader__cut">
                        <div class="pswp__preloader__donut"></div>
                      </div>
                    </div>
                </div>
            </div>

            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                <div class="pswp__share-tooltip"></div> 
            </div>

            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
            </button>

            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
            </button>

            <div class="pswp__caption">
                <div class="pswp__caption__center"></div>
            </div>

        </div>

    </div>

</div>
          
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <!--<div class="text-center">-->
          <!--      <button class="btn btn-primary" onclick="tampilkanLebih(10)">Tampilkan Lebih Banyak</button>-->
          <!--</div>-->
        </div>
        <!-- /.card-footer -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<script>
 //    new PhotoSwipe();
    function onThumbnailsClick(e){
    
    var pswpElement = document.querySelectorAll('.pswp')[0];

    // build items array
    var galleryAll = document.querySelectorAll('.img-gallery');
//    var chilegallery = galleryAll.childNodes;
    var galleryLeght = galleryAll.length;
     var items = [];
    for(var i=0;i<galleryLeght;i++){           
    items.push(
          {
             src: galleryAll[i].src,
             w:galleryAll[i].naturalWidth,
             h:galleryAll[i].naturalHeight,
          },
        );
    };
     
    
    console.log(galleryAll);
    
    // define options (if needed)
    var options = {
             // history & focus options are disabled on CodePen        
        history: false,
        focus: false,
        index:e,

        showAnimationDuration: 0,
        hideAnimationDuration: 0
        
    };
    
    var gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options);
    gallery.init();

    console.log(e);
    }
     // loop through all gallery elements and bind events
    var galleryElements = document.querySelectorAll( '.img-gallery' );

    for(var i = 0, l = galleryElements.length; i < l; i++) {
        galleryElements[i].setAttribute('data-pswp-uid', i+1);
        galleryElements[i].setAttribute('onclick','onThumbnailsClick('+i+')');
    }
    
//    tampilanGallery();
    function tampilanGallery(){
    var galleryImg = document.querySelectorAll('.demo-gallery__img--main'),
        galleryImgLeght = galleryImg.length;
    for(var i = 0; i<galleryImgLeght; i++){
        if(i>galleryImgLeght){i=galleryImgLeight;}
        galleryImg[i].style = "max-width:400px;max-height:400px";
        i += 4;
    }

    }
    
//    $('.grid').mansory({
//        itemSelector: '.grid-item',
//        columnWidth: 200
//    })
    
   
</script>