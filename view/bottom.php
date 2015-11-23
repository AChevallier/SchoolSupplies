 </div>
                    </div>
                </div>
            <script type="text/javascript">
                window.onload = function(){
                    var selected_page = document.getElementsByClassName('selected_navbar')[0];
                    var includeHtml = document.getElementById('include_html_here');
                }
                var navBarSelector = function(page){
                    var navbar_item = document.getElementById(page);
                    var includeHtml = document.getElementById('include_html_here');
                    var selected_page = document.getElementsByClassName('selected_navbar')[0];
                    
                    selected_page.classList.remove('selected_navbar');
                    navbar_item.classList.add('selected_navbar')
                }
            </script>
	</body>
</html>