$(function() {
	$('.play').click(function() {
		$('<audio controls><source src=\"' + this.href + '\" type=\"audio/' + this.href.substr(-3) + '\"></audio>').insertAfter(this);
		$(this).remove();
		return false
	})
});