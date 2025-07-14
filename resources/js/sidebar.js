
import { Drawer } from 'flowbite'
export default function sidebar() {
    const sideBar = document.getElementById('sidebar');

    const sidebarButton = document.getElementById('sidebar-button');

    const hideSideBarButton = document.getElementById('hide-sidebar');

    const options = {
        placement: 'left',
        backdrop: true,
        bodyScrolling: false,
        edge: true,
        edgeOffset: '',
        backdropClasses:
            'md:hidden bg-gray-900/50 dark:bg-gray-900/80 fixed inset-0 z-30',
        onHide: () => {
           sideBar.setAttribute('aria-hidden', 'false');
        }
    }
    const instanceOptions = {
        id: "sidebar",
        override: true,
    }


    const drawer = new Drawer(sideBar, options, instanceOptions);


    sidebarButton.addEventListener('click', function(){
        drawer.toggle()
    });

    hideSideBarButton.addEventListener('click', function(){
        drawer.hide()
    });
}
