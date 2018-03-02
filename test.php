<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>JCB Soluções Industriais</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
</head>


<style>

$bg: #289ecb;
$line: #b2e9ff;
$wrapper: #e4f0f4;

$t1: .6s ease;

%clearfix {
  content: "";
  display: table;
  clear: both;
}

html {
  font-family: 'Oxygen', sans-serif;
}

*,
*:after,
*:before {
  box-sizing: border-box;
}
    
img {
  width: auto;
  height: auto;
  max-height: 100%;
}

h3 {
  font-size: 40px;
  margin-top: 0;
  font-weight: 300;
}

/*** The timeline styles and structure ***/
.tl-wrapper {
  background: $wrapper;
  min-height: 1px;
  position: relative;
}

.timeline {
  position: relative;
  width: 100%;
  min-height: 1px;

  list-style: none;
  margin: 0;
  padding: 0;
  li {
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    &:after {
      @extend %clearfix;
    }
  }
}

/*** The items ***/
.tl-item {
  visibility: hidden;
  overflow: hidden;
  z-index: 0;
  .tl-copy {
    transition: $t1;
    //opacity: 0;
    transform: translate3d(60%,0,0);
  }
  .tl-image {
    transition: $t1;
    //opacity: .5;
    transform: translate3d(0,-100%,0);
  }
}

.tl-item.tl-active {
  visibility: visible;
  z-index: 10;
  .tl-copy {
    opacity: 1;
    transform: translate3d(0,0,0);
  }
  .tl-image {
    opacity: 1;
    transform: translate3d(0,0,0);
  }
}

.tl-image {
  float: left;
  width: 70%;
  img {
    display: block;
  }
}

.tl-copy {
  width: 30%;
  height: 100%;
  position: absolute;
  top: 0;
  right: 0;
  
  padding: 16px;
  padding: 1rem;
  background: $bg;
  color: #fff;
  &:after {
    content: "";
    position: absolute;
    bottom: 30px;
    left: -19px;
    
    width: 0;
    height: 0;
    border-style: solid;
    border-width: 21px 20px 21px 0;
    border-color: transparent $bg transparent transparent;
  }
}

/*** The arrows for the items ***/
.tl-items-arrow-left,
.tl-items-arrow-right {
  position: absolute;
  top: 50%;
  width: 22px;
  height: 40px;
  top: 50%;
  margin-top: -40px;
  z-index: 100;
  &:before,
  &:after {
    content: "";
    display: block;
    position: absolute;
    left: 0;
    width: 28px;
    height: 2px;
    background: #fff;
  }
}
.tl-items-arrow-left {
  left: 0;
  &:before {
    top: 0;
    transform-origin: top right;
    transform: rotate(-45deg);
  }
  &:after {
    bottom: 0;
    transform-origin: bottom right;
    transform: rotate(45deg);
  }
}
.tl-items-arrow-right {
  right: 0;
  &:before {
    top: 0;
    transform-origin: top left;
    transform: rotate(45deg);
  }
  &:after {
    bottom: 0;
    transform-origin: bottom left;
    transform: rotate(-45deg);
  }
}

/*** The nav's styles ***/
.tl-nav-wrapper {
  position: absolute;
  bottom: 10px;
  left: 0;
  margin: 0;
  padding: 16px 0 0 0;
  
  border-top: 1px solid $line;
  overflow-x: hidden;
  width: 100%;
  &:before,
  &:after {
    content: "";
    width: 38px;
    height: 86px;
    position: absolute;
    top: 17px;
    
    background: $wrapper;
    z-index: 50;
  }
  &:before { left: 0; }
  &:after { right: 0; }
}

.no-csstransforms .tl-nav-wrapper {
  overflow-x: auto;
}

.tl-nav {
  list-style: none;
  margin: 0;
  padding-top: 16px;
  border-top: 1px dashed $bg;
  
  transition: all .4s ease;
  li {
    width: 70px;
    height: 70px;
    position: relative;
    
    float: left;
    cursor: pointer;
    margin-right: 1rem;
    
    font-size: 12px;
    text-align: center;
    div {
      width: 34px;
      height: 34px;
      margin: auto;
      
      background: $bg;
      color: #fff;
      padding-top: 9px;
      border-radius: 1000px;
      transition: $t1;
    }
    &:hover div,
    &.tl-active div{
      width: 70px;
      height: 70px;
      background: transparent;
      color: $bg;
      border: 1px solid $bg;
      font-size: 24px;
      padding-top: 19px;
    }
    &:before {
      content: "";
      width: 4px;
      height: 4px;
      position: absolute;
      top: -10px;
      left: 50%;
      margin-left: -2px;
      
      background: $bg;
      border-radius: 1000px;
    }
  }
  &:after {
    @extend %clearfix;
  }
}

/*** The nav's nav styles ***/
.tl-nav-arrow-left,
.tl-nav-arrow-right {
  position: absolute;
  width: 12px;
  height: 20px;
  top: 50%;
  z-index: 100;
  &:before,
  &:after {
    content: "";
    display: block;
    position: absolute;
    width: 14px;
    height: 2px;
    background: $bg;
  }
}
.tl-nav-arrow-left {
  left: 9px;
  &:before {
    top: 0;
    transform-origin: top right;
    transform: rotate(-45deg);
  }
  &:after {
    bottom: 0;
    transform-origin: bottom right;
    transform: rotate(45deg);
  }
}
.tl-nav-arrow-right {
  right: 9px;
  &:before {
    top: 0;
    transform-origin: top left;
    transform: rotate(45deg);
  }
  &:after {
    bottom: 0;
    transform-origin: bottom left;
    transform: rotate(-45deg);
  }
}

.no-csstransforms .tl-nav-arrow-left,
.no-csstransforms .tl-nav-arrow-right {
  display: none;
}
</style>


<body>

<div class="tl-wrapper">
  <ul class="timeline">
    <li class="tl-item" data-year="1981">
      <div class="tl-image"><img src=" http://placehold.it/1650x1000/"/></div>
      <div class="tl-copy">
        <h3 class="title">Aw, you're all Mr. Grumpy Face today. They're not aliens, they're Earth&hellip;liens!</h3>
        <div class="tl-description">
          <p>Aw, you're all Mr. Grumpy Face today. No&hellip; It's a thing; it's like a plan, but with more greatness. They're not aliens, they're Earth&hellip;liens! Sorry, checking all the water in this area; there's an escaped fish. All I've got to do is pass as an ordinary human being. Simple. What could possibly go wrong? You've swallowed a planet!</p>
        </div>
      </div>
    </li>
    <li class="tl-item" data-year="1988">
      <div class="tl-image"><img src=" http://placehold.it/1650x1000/"/></div>
      <div class="tl-copy">
        <h3 class="title">Aw, you're all Mr. Grumpy Face today. They're not aliens, they're Earth&hellip;liens!</h3>
        <div class="tl-description">
          <p>Aw, you're all Mr. Grumpy Face today. No&hellip; It's a thing; it's like a plan, but with more greatness. They're not aliens, they're Earth&hellip;liens! Sorry, checking all the water in this area; there's an escaped fish. All I've got to do is pass as an ordinary human being. Simple. What could possibly go wrong? You've swallowed a planet!</p>
        </div>
      </div>
    </li>
    <li class="tl-item" data-year="1989">
      <div class="tl-image"><img src=" http://placehold.it/1650x1000/"/></div>
      <div class="tl-copy">
        <h3 class="title">Aw, you're all Mr. Grumpy Face today. They're not aliens, they're Earth&hellip;liens!</h3>
        <div class="tl-description">
          <p>Aw, you're all Mr. Grumpy Face today. No&hellip; It's a thing; it's like a plan, but with more greatness. They're not aliens, they're Earth&hellip;liens! Sorry, checking all the water in this area; there's an escaped fish. All I've got to do is pass as an ordinary human being. Simple. What could possibly go wrong? You've swallowed a planet!</p>
        </div>
      </div>
    </li>
    <li class="tl-item" data-year="1990">
      <div class="tl-image"><img src=" http://placehold.it/1650x1000/"/></div>
      <div class="tl-copy">
        <h3 class="title">Aw, you're all Mr. Grumpy Face today. They're not aliens, they're Earth&hellip;liens!</h3>
        <div class="tl-description">
          <p>Aw, you're all Mr. Grumpy Face today. No&hellip; It's a thing; it's like a plan, but with more greatness. They're not aliens, they're Earth&hellip;liens! Sorry, checking all the water in this area; there's an escaped fish. All I've got to do is pass as an ordinary human being. Simple. What could possibly go wrong? You've swallowed a planet!</p>
        </div>
      </div>
    </li>
    <li class="tl-item" data-year="1991">
      <div class="tl-image"><img src=" http://placehold.it/1650x1000/"/></div>
      <div class="tl-copy">
        <h3 class="title">Aw, you're all Mr. Grumpy Face today. They're not aliens, they're Earth&hellip;liens!</h3>
        <div class="tl-description">
          <p>Aw, you're all Mr. Grumpy Face today. No&hellip; It's a thing; it's like a plan, but with more greatness. They're not aliens, they're Earth&hellip;liens! Sorry, checking all the water in this area; there's an escaped fish. All I've got to do is pass as an ordinary human being. Simple. What could possibly go wrong? You've swallowed a planet!</p>
        </div>
      </div>
    </li>
    <li class="tl-item" data-year="1992">
      <div class="tl-image"><img src=" http://placehold.it/1650x1000/"/></div>
      <div class="tl-copy">
        <h3 class="title">Aw, you're all Mr. Grumpy Face today. They're not aliens, they're Earth&hellip;liens!</h3>
        <div class="tl-description">
          <p>Aw, you're all Mr. Grumpy Face today. No&hellip; It's a thing; it's like a plan, but with more greatness. They're not aliens, they're Earth&hellip;liens! Sorry, checking all the water in this area; there's an escaped fish. All I've got to do is pass as an ordinary human being. Simple. What could possibly go wrong? You've swallowed a planet!</p>
        </div>
      </div>
    </li>
    <li class="tl-item" data-year="1993">
      <div class="tl-image"><img src=" http://placehold.it/1650x1000/"/></div>
      <div class="tl-copy">
        <h3 class="title">Aw, you're all Mr. Grumpy Face today. They're not aliens, they're Earth&hellip;liens!</h3>
        <div class="tl-description">
          <p>Aw, you're all Mr. Grumpy Face today. No&hellip; It's a thing; it's like a plan, but with more greatness. They're not aliens, they're Earth&hellip;liens! Sorry, checking all the water in this area; there's an escaped fish. All I've got to do is pass as an ordinary human being. Simple. What could possibly go wrong? You've swallowed a planet!</p>
        </div>
      </div>
    </li>
    <li class="tl-item" data-year="1994">
      <div class="tl-image"><img src=" http://placehold.it/1650x1000/"/></div>
      <div class="tl-copy">
        <h3 class="title">Aw, you're all Mr. Grumpy Face today. They're not aliens, they're Earth&hellip;liens!</h3>
        <div class="tl-description">
          <p>Aw, you're all Mr. Grumpy Face today. No&hellip; It's a thing; it's like a plan, but with more greatness. They're not aliens, they're Earth&hellip;liens! Sorry, checking all the water in this area; there's an escaped fish. All I've got to do is pass as an ordinary human being. Simple. What could possibly go wrong? You've swallowed a planet!</p>
        </div>
      </div>
    </li>
    <li class="tl-item" data-year="1995">
      <div class="tl-image"><img src=" http://placehold.it/1650x1000/"/></div>
      <div class="tl-copy">
        <h3 class="title">Aw, you're all Mr. Grumpy Face today. They're not aliens, they're Earth&hellip;liens!</h3>
        <div class="tl-description">
          <p>Aw, you're all Mr. Grumpy Face today. No&hellip; It's a thing; it's like a plan, but with more greatness. They're not aliens, they're Earth&hellip;liens! Sorry, checking all the water in this area; there's an escaped fish. All I've got to do is pass as an ordinary human being. Simple. What could possibly go wrong? You've swallowed a planet!</p>
        </div>
      </div>
    </li>
    <li class="tl-item" data-year="1996">
      <div class="tl-image"><img src=" http://placehold.it/1650x1000/"/></div>
      <div class="tl-copy">
        <h3 class="title">Aw, you're all Mr. Grumpy Face today. They're not aliens, they're Earth&hellip;liens!</h3>
        <div class="tl-description">
          <p>Aw, you're all Mr. Grumpy Face today. No&hellip; It's a thing; it's like a plan, but with more greatness. They're not aliens, they're Earth&hellip;liens! Sorry, checking all the water in this area; there's an escaped fish. All I've got to do is pass as an ordinary human being. Simple. What could possibly go wrong? You've swallowed a planet!</p>
        </div>
      </div>
    </li>
    <li class="tl-item" data-year="1997">
      <div class="tl-image"><img src=" http://placehold.it/1650x1000/"/></div>
      <div class="tl-copy">
        <h3 class="title">Aw, you're all Mr. Grumpy Face today. They're not aliens, they're Earth&hellip;liens!</h3>
        <div class="tl-description">
          <p>Aw, you're all Mr. Grumpy Face today. No&hellip; It's a thing; it's like a plan, but with more greatness. They're not aliens, they're Earth&hellip;liens! Sorry, checking all the water in this area; there's an escaped fish. All I've got to do is pass as an ordinary human being. Simple. What could possibly go wrong? You've swallowed a planet!</p>
        </div>
      </div>
    </li>
    <li class="tl-item" data-year="1998">
      <div class="tl-image"><img src=" http://placehold.it/1650x1000/"/></div>
      <div class="tl-copy">
        <h3 class="title">Aw, you're all Mr. Grumpy Face today. They're not aliens, they're Earth&hellip;liens!</h3>
        <div class="tl-description">
          <p>Aw, you're all Mr. Grumpy Face today. No&hellip; It's a thing; it's like a plan, but with more greatness. They're not aliens, they're Earth&hellip;liens! Sorry, checking all the water in this area; there's an escaped fish. All I've got to do is pass as an ordinary human being. Simple. What could possibly go wrong? You've swallowed a planet!</p>
        </div>
      </div>
    </li>
    <li class="tl-item" data-year="1999">
      <div class="tl-image"><img src=" http://placehold.it/1650x1000/"/></div>
      <div class="tl-copy">
        <h3 class="title">Aw, you're all Mr. Grumpy Face today. They're not aliens, they're Earth&hellip;liens!</h3>
        <div class="tl-description">
          <p>Aw, you're all Mr. Grumpy Face today. No&hellip; It's a thing; it's like a plan, but with more greatness. They're not aliens, they're Earth&hellip;liens! Sorry, checking all the water in this area; there's an escaped fish. All I've got to do is pass as an ordinary human being. Simple. What could possibly go wrong? You've swallowed a planet!</p>
        </div>
      </div>
    </li>
    <li class="tl-item" data-year="2000">
      <div class="tl-image"><img src=" http://placehold.it/1650x1000/"/></div>
      <div class="tl-copy">
        <h3 class="title">Aw, you're all Mr. Grumpy Face today. They're not aliens, they're Earth&hellip;liens!</h3>
        <div class="tl-description">
          <p>Aw, you're all Mr. Grumpy Face today. No&hellip; It's a thing; it's like a plan, but with more greatness. They're not aliens, they're Earth&hellip;liens! Sorry, checking all the water in this area; there's an escaped fish. All I've got to do is pass as an ordinary human being. Simple. What could possibly go wrong? You've swallowed a planet!</p>
        </div>
      </div>
    </li>
    <li class="tl-item" data-year="2001">
      <div class="tl-image"><img src=" http://placehold.it/1650x1000/"/></div>
      <div class="tl-copy">
        <h3 class="title">Aw, you're all Mr. Grumpy Face today. They're not aliens, they're Earth&hellip;liens!</h3>
        <div class="tl-description">
          <p>Aw, you're all Mr. Grumpy Face today. No&hellip; It's a thing; it's like a plan, but with more greatness. They're not aliens, they're Earth&hellip;liens! Sorry, checking all the water in this area; there's an escaped fish. All I've got to do is pass as an ordinary human being. Simple. What could possibly go wrong? You've swallowed a planet!</p>
        </div>
      </div>
    </li>
    <li class="tl-item" data-year="2002">
      <div class="tl-image"><img src=" http://placehold.it/1650x1000/"/></div>
      <div class="tl-copy">
        <h3 class="title">Aw, you're all Mr. Grumpy Face today. They're not aliens, they're Earth&hellip;liens!</h3>
        <div class="tl-description">
          <p>Aw, you're all Mr. Grumpy Face today. No&hellip; It's a thing; it's like a plan, but with more greatness. They're not aliens, they're Earth&hellip;liens! Sorry, checking all the water in this area; there's an escaped fish. All I've got to do is pass as an ordinary human being. Simple. What could possibly go wrong? You've swallowed a planet!</p>
        </div>
      </div>
    </li>
    <li class="tl-item" data-year="2003">
      <div class="tl-image"><img src=" http://placehold.it/1650x1000/"/></div>
      <div class="tl-copy">
        <h3 class="title">Aw, you're all Mr. Grumpy Face today. They're not aliens, they're Earth&hellip;liens!</h3>
        <div class="tl-description">
          <p>Aw, you're all Mr. Grumpy Face today. No&hellip; It's a thing; it's like a plan, but with more greatness. They're not aliens, they're Earth&hellip;liens! Sorry, checking all the water in this area; there's an escaped fish. All I've got to do is pass as an ordinary human being. Simple. What could possibly go wrong? You've swallowed a planet!</p>
        </div>
      </div>
    </li>
    <li class="tl-item" data-year="2004">
      <div class="tl-image"><img src=" http://placehold.it/1650x1000/"/></div>
      <div class="tl-copy">
        <h3 class="title">Aw, you're all Mr. Grumpy Face today. They're not aliens, they're Earth&hellip;liens!</h3>
        <div class="tl-description">
          <p>Aw, you're all Mr. Grumpy Face today. No&hellip; It's a thing; it's like a plan, but with more greatness. They're not aliens, they're Earth&hellip;liens! Sorry, checking all the water in this area; there's an escaped fish. All I've got to do is pass as an ordinary human being. Simple. What could possibly go wrong? You've swallowed a planet!</p>
        </div>
      </div>
    </li>
    <li class="tl-item" data-year="2005">
      <div class="tl-image"><img src=" http://placehold.it/1650x1000/"/></div>
      <div class="tl-copy">
        <h3 class="title">Aw, you're all Mr. Grumpy Face today. They're not aliens, they're Earth&hellip;liens!</h3>
        <div class="tl-description">
          <p>Aw, you're all Mr. Grumpy Face today. No&hellip; It's a thing; it's like a plan, but with more greatness. They're not aliens, they're Earth&hellip;liens! Sorry, checking all the water in this area; there's an escaped fish. All I've got to do is pass as an ordinary human being. Simple. What could possibly go wrong? You've swallowed a planet!</p>
        </div>
      </div>
    </li>
    <li class="tl-item" data-year="2006">
      <div class="tl-image"><img src=" http://placehold.it/1650x1000/"/></div>
      <div class="tl-copy">
        <h3 class="title">Aw, you're all Mr. Grumpy Face today. They're not aliens, they're Earth&hellip;liens!</h3>
        <div class="tl-description">
          <p>Aw, you're all Mr. Grumpy Face today. No&hellip; It's a thing; it's like a plan, but with more greatness. They're not aliens, they're Earth&hellip;liens! Sorry, checking all the water in this area; there's an escaped fish. All I've got to do is pass as an ordinary human being. Simple. What could possibly go wrong? You've swallowed a planet!</p>
        </div>
      </div>
    </li>
    <li class="tl-item" data-year="2007">
      <div class="tl-image"><img src=" http://placehold.it/1650x1000/"/></div>
      <div class="tl-copy">
        <h3 class="title">Aw, you're all Mr. Grumpy Face today. They're not aliens, they're Earth&hellip;liens!</h3>
        <div class="tl-description">
          <p>Aw, you're all Mr. Grumpy Face today. No&hellip; It's a thing; it's like a plan, but with more greatness. They're not aliens, they're Earth&hellip;liens! Sorry, checking all the water in this area; there's an escaped fish. All I've got to do is pass as an ordinary human being. Simple. What could possibly go wrong? You've swallowed a planet!</p>
        </div>
      </div>
    </li>
    <li class="tl-item" data-year="2008">
      <div class="tl-image"><img src=" http://placehold.it/1650x1000/"/></div>
      <div class="tl-copy">
        <h3 class="title">Aw, you're all Mr. Grumpy Face today. They're not aliens, they're Earth&hellip;liens!</h3>
        <div class="tl-description">
          <p>Aw, you're all Mr. Grumpy Face today. No&hellip; It's a thing; it's like a plan, but with more greatness. They're not aliens, they're Earth&hellip;liens! Sorry, checking all the water in this area; there's an escaped fish. All I've got to do is pass as an ordinary human being. Simple. What could possibly go wrong? You've swallowed a planet!</p>
        </div>
      </div>
    </li>
  </ul>
</div>

<script>
    /*** Detect the browser's prefixes ***/ 
if(document.addEventListener){ // Only IE9+ support this ;)
  // http://davidwalsh.name/vendor-prefix
  // Can't use it in IE8- as it brakes the page...
  var isPrefixed = (function () {
    var styles = window.getComputedStyle(document.documentElement, ''),
      pre = (Array.prototype.slice
        .call(styles)
        .join('') 
        .match(/-(moz|webkit|ms)-/) || (styles.OLink === '' && ['', 'o'])
      )[1],
      dom = ('WebKit|Moz|MS|O').match(new RegExp('(' + pre + ')', 'i'))[1];
    return {
      dom: dom,
      lowercase: pre,
      css: '-' + pre + '-',
      js: pre[0].toUpperCase() + pre.substr(1)
    };
  })();

  // Deals with prefixes
  var prefix = isPrefixed.css;

} else {
  var prefix = "";
}

/*** Slides ***/
var currentSlide = 0,
    totalSlides  = $(".tl-item").length - 1;

// Creates the navigation
$(".timeline").after("<div class='tl-nav-wrapper'><ul class='tl-nav'></ul></div><a href='#' class='tl-items-arrow-left'></a><a href='#' class='tl-items-arrow-right'></a>");
$( ".tl-copy" ).wrapInner( "<div class='tl-copy-inner'></div>");

// Cicle through items and creates the nav
$(".tl-item").each(function(i) {
  var year = $(".tl-item:eq(" + i + ")" ).data("year");
  $(".tl-nav").append("<li><div>" + year + "</div></li>");
  
  // Click handlers
  $(".tl-nav li:eq(" + i + ")").click(function() {
    if(!$(".tl-item:eq(" + i + ")" ).hasClass("tl-active")) {
      // Activates the item
      $(".tl-item").removeClass("tl-active");
      $(".tl-item:eq(" + i + ")" ).addClass("tl-active");
      currentSlide = i;

      // Activates the item nav
      $(".tl-nav li").removeClass("tl-active");
      $(".tl-nav li:eq(" + i + ")" ).addClass("tl-active");
    }
  });
});

// Activates the first slide
$(".tl-item:first, .tl-nav li:first").addClass("tl-active");

// Slide's arrows click handlers
$(".tl-items-arrow-left").on("click", function(){
  if(currentSlide > 0) {
    currentSlide--;
  
    // Activates the previous item
    $(".tl-item").removeClass("tl-active");
    $(".tl-item:eq(" + currentSlide +")").addClass("tl-active");
    
    // Activates the previous item nav
    $(".tl-nav li").removeClass("tl-active");
    $(".tl-nav li:eq(" + currentSlide + ")" ).addClass("tl-active");
  }
});

$(".tl-items-arrow-right").on("click", function(){
  if(currentSlide < totalSlides) {
    currentSlide++;
  
    // Activates the next item
    $(".tl-item").removeClass("tl-active");
    $(".tl-item:eq(" + currentSlide +")").addClass("tl-active");
    
    // Activates the next item nav
    $(".tl-nav li").removeClass("tl-active");
    $(".tl-nav li:eq(" + currentSlide + ")" ).addClass("tl-active");
  }
});
  
/*** Nav ***/
// The nav's width
var navWidth = ($(".tl-nav li").outerWidth(true) * $(".tl-nav li").length) + 36;
$(".tl-nav").width(navWidth);

// The nav's arrows
$(".tl-nav-wrapper").append("<a href='#' class='tl-nav-arrow-left'></a><a href='#' class='tl-nav-arrow-right'></a>");

/*** The timeline's height ***/
var vpHeight  = $(window).height();
var tlHeight = vpHeight - $(".tl-nav-wrapper").outerHeight(true) - 26;
$(".tl-wrapper").height(vpHeight);
$(".tl-item").css("max-height", tlHeight);
$(".tl-item").height(tlHeight);

/*** Nav's navigation... ***/
var navTranslation = 0;
var navLimit = (navWidth - $(".tl-nav-wrapper").outerWidth(true) + 20) * -1;

// To the left
$(".tl-nav-arrow-left").on("click", function() {
  if(navTranslation < 0) {
    navTranslation = navTranslation + 86;
    $(".tl-nav").css(prefix + "transform", "translateX(" + navTranslation + "px)");
  }
});

// To the right
$(".tl-nav-arrow-right").on("click", function() {
  if(navTranslation >= navLimit) {
    navTranslation = navTranslation - 86;
    $(".tl-nav").css(prefix + "transform", "translateX(" + navTranslation + "px)");
  }
});</script>



<?php include "includes/footer.php"; ?>