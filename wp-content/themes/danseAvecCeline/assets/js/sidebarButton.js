document.addEventListener('DOMContentLoaded', function() {
    var showSidebarButton = document.getElementById('showSidebarButton');
    var sidebar = document.getElementById('block-2'); 

    if (showSidebarButton && sidebar) {
        showSidebarButton.addEventListener('click', function() {
            sidebar.style.display = 'block'; 
        });
    }
});