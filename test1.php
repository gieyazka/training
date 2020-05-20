<style>
  .red {
    color: #C00;
  }
</style>

<script>
  var div = $('#foo')
  var observer = new MutationObserver(function(mutations) {
    mutations.forEach(function(mutation) {
      if (mutation.attributeName === "class") {
        var attributeValue = $(mutation.target).prop(mutation.attributeName);
        console.log("Class attribute changed to:", attributeValue);
      }
    });
  });
  observer.observe(div[0], {
    attributes: true
  });

  div.addClass('red');
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<div id="foo" class="bar">#foo.bar</div>

