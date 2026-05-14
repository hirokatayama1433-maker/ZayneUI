/**
 * zayne/sidebar.js
 * Handles desktop sidebar collapsing behavior.
 * State is managed on <html> element and localStorage.
 * Transitions are managed via CSS, potentially dependent on 'sidebar-ready' class.
 */

const Sidebar = {

    get collapsed() {
        // Check if the documentElement has the class indicating collapsed state
        return document.documentElement.classList.contains('sidebar-collapsed');
    },

    get mode() {
        // Get the mode from the data attribute on the .zaynesidebar element
        // Default to 'collapsible' if not found
        return document.querySelector('.zaynesidebar')?.dataset.mode ?? 'collapsible';
    },
    
    get collapseType() {
        // Get the collapse type from the data attribute
        return document.querySelector('.zaynesidebar')?.dataset.collapse ?? 'viewicons';
    },

    collapse() {
        // Only perform collapse if in collapsible mode and not already collapsed
        if (this.mode === 'collapsible' && !this.collapsed) {
            document.documentElement.classList.add('sidebar-collapsed');
            localStorage.setItem('zayne-sidebar', 'true'); // Remember state
        }
    },

    expand() {
        // Only perform expand if not already expanded
        if (this.collapsed) {
            document.documentElement.classList.remove('sidebar-collapsed');
            localStorage.setItem('zayne-sidebar', 'false'); // Remember state
        }
    },

    toggle() {
        // Toggle between collapsed and expanded states
        this.collapsed ? this.expand() : this.collapse();
    },

    init() {
        // Initialize state from localStorage on page load
        if (localStorage.getItem('zayne-sidebar') === 'true') {
            // Ensure it's applied only if the mode is collapsible
            if (this.mode === 'collapsible') {
                document.documentElement.classList.add('sidebar-collapsed');
            } else {
                 // If mode is static or something else, clear the localstorage item
                 // to prevent unexpected behavior on subsequent loads.
                 localStorage.removeItem('zayne-sidebar');
            }
        }

        // Add 'sidebar-ready' class after a short delay to prevent FOUC (Flash of Unstyled Content)
        // This allows CSS transitions to apply smoothly.
        requestAnimationFrame(() => {
            requestAnimationFrame(() => {
                document.documentElement.classList.add('sidebar-ready');
            });
        });
    },
};

// Initialize the sidebar state when the DOM is ready
Sidebar.init();

// Expose Sidebar object globally under window.Zayne for potential external access
window.Zayne = window.Zayne || {};
window.Zayne.Sidebar = Sidebar;

// Add event listeners for toggling, e.g., if there's a desktop toggle button
// Example: document.getElementById('sidebar-toggle-button')?.addEventListener('click', Sidebar.toggle.bind(Sidebar));