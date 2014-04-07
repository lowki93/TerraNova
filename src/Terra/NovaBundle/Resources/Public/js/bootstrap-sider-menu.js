!function ($) {

  //"use strict"; // jshint ;_;


 /* COLLAPSE PUBLIC CLASS DEFINITION
  * ================================ */

  var SiderMenu = function (element, options) {
    this.$element = $(element)
    this.options = $.extend({}, $.fn.sidermenu.defaults, options)
    var self = this;
    
    this.$element.click(function(){
      self.options.toggle && self.toggle()
    })
    
    var elt = $(options.source).clone();
    elt.attr('id',options.target);
    
    elt.children('ul').children('li.active').children('ul.dropdown-menu').css('display','block');
    elt.children('ul').children('li.active').children('a').css('color','rgb(85, 85, 85)');
    elt.children('ul').children('li.active').children('a').css('background-color','rgb(229, 229, 229)');
    elt.children('ul').children('li.active').children('a').css('box-shadow','0px 3px 8px rgba(0, 0, 0, 0.125) inset');
    
    elt.children('ul').children('li').each(function(idx, item){
      if($(item).hasClass('dropdown')) {
        $(item).addClass('open');
      }
    });
    
    this.$sidr = elt;
    this.$sidr.css('transition','all .4s');
    
    if($('#'+options.target).html() === undefined){
      $('body').prepend(this.$sidr);
    }

    this.$sidr.height($(window).height());
    this.$sidr.css('position','absolute')
    this.$sidr.css('z-index','1')
    this.$sidr.css(options.direction,-this.$sidr.outerWidth());
      
    
    this.$sidr.next().css('position','relative');
    this.$sidr.next().css('transition',options.direction+' .4s');
    this.$sidr.next().css('z-index','2');
    
    $('.btn-navbar').css('float',options.direction);
    
    this.$sidr.width(this.$sidr.width());
    

    if (this.options.parent) {
      this.$parent = $(this.options.parent)
    }
      
  }

  SiderMenu.prototype = {

    constructor: SiderMenu
  
  , show: function () {
      $('html').css('overflow','hidden');
      this.$sidr.css(options.direction,'0px');
      this.$sidr.next().css(options.direction,this.$sidr.outerWidth());
      this.$sidr.next().height($(window).height());
      this.$sidr.next().css('box-shadow','0px 0px 8px rgba(0,0,0,0.6)');
      this.$sidr.addClass('visible');
    }

  , hide: function () {
      $('html').css('overflow','hidden');
      this.$sidr.css(options.direction,-this.$sidr.outerWidth());
      this.$sidr.next().css(options.direction,0);
      this.$sidr.next().css('height','auto');
      this.$sidr.next().css('box-shadow','none');
      this.$sidr.removeClass('visible');
    }

  , toggle: function () {
     console.log($(window).width()-this.$sidr.outerWidth());
      this[this.$sidr.hasClass('visible') ? 'hide' : 'show']()
    }

  }


 /* COLLAPSE PLUGIN DEFINITION
  * ========================== */

  var old = $.fn.sidermenu

  $.fn.sidermenu = function (option) {
    
    $this = $(this);
    data = $this.data('sidermenu')
    options = $.extend({}, $.fn.sidermenu.defaults, $this.data(), typeof option == 'object' && option)
    
    return new SiderMenu(this, options)

  }

  $.fn.sidermenu.defaults = {
    toggle: true
  }

  $.fn.sidermenu.Constructor = SiderMenu


 /* COLLAPSE NO CONFLICT
  * ==================== */

  $.fn.sidermenu.noConflict = function () {
    $.fn.sidermenu = old
    return this
  }


  /* SIDER MENU INITIALISATION
   *========================== */

  $(document).ready(function(){
    $(window).trigger('resize');
  });

  $(window).resize(function(){
    $('a[data-toggle="sidermenu"]').each(function(){
      var $this = $(this), href
      , source = $this.attr('data-source')
        || e.preventDefault()
        || (href = $this.attr('href')) && href.replace(/.*(?=#[^\s]+$)/, '')
        , option = $this.data()
      
      if($(window).width() > 980){
        $('#'+$(this).data('target')).remove();
        $('.btn-navbar').css('float','right');
        $('body *:first').css('left','0px');
        $('body *:first').css('transition','none');
        //$('body *:first').css('width','auto');
      } else {
        $(this).sidermenu(option);
      }
      
    })
  });

}(window.jQuery);