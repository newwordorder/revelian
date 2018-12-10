
var j = 0;
jQuery(window).scroll(function() {
  const counter =  document.querySelector('#counter');
  if(counter){
    var oTop = $('#counter').offset().top - window.innerHeight;
    if (j == 0 && $(window).scrollTop() > oTop) {
      $('.counter__number').each(function() {
        var $this = $(this),
          countTo = $this.attr('data-count');
          console.log($this);
          if(countTo == 0){
            $this[0].style.opacity = 0;
          }
        $({
          countNum: $this.text()
        }).animate({
            countNum: countTo
          },

          {

            duration: 2000,
            easing: 'swing',
            step: function() {
              $this.text(Math.floor(this.countNum));
            },
            complete: function() {
              $this.text(this.countNum);
              //alert('finished');
            }

          });
      });
      j = 1;
    }
  }
});