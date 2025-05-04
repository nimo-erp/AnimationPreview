/**
 * SAMP Animation Previewer
 * Main JavaScript file
 */

document.addEventListener('DOMContentLoaded', function() {
    const videos = document.querySelectorAll('video');
    videos.forEach(video => {
        video.addEventListener('ended', function() {
            video.play();
        });
    });

    const setupMobileMenu = () => {
        const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
        if (mobileMenuToggle) {
            const menu = document.querySelector('.menu');
            mobileMenuToggle.addEventListener('click', () => {
                menu.classList.toggle('active');
            });
        }
    };

    const images = document.querySelectorAll('img');
    images.forEach(img => {
        img.addEventListener('error', function() {
            if (!this.src.includes('no-preview.jpg')) {
                this.src = 'assets/images/no-preview.jpg';
            }
        });
    });

    const searchForm = document.querySelector('.search-form');
    if (searchForm) {
        searchForm.addEventListener('submit', function(e) {
            const searchInput = this.querySelector('input[name="query"]');
            if (searchInput.value.trim() === '') {
                e.preventDefault();
                searchInput.focus();
            }
        });
    }

    const setupCodeCopy = () => {
        const codeBlocks = document.querySelectorAll('.info-group pre code');
        codeBlocks.forEach(code => {
            const copyBtn = document.createElement('button');
            copyBtn.className = 'copy-btn';
            copyBtn.innerHTML = 'Copy';
            copyBtn.setAttribute('title', 'Copy to clipboard');

            code.parentNode.insertBefore(copyBtn, code);
            
            copyBtn.addEventListener('click', () => {
                const tempTextArea = document.createElement('textarea');
                tempTextArea.value = code.textContent;
                document.body.appendChild(tempTextArea);
                tempTextArea.select();
                document.execCommand('copy');
                document.body.removeChild(tempTextArea);
                
                copyBtn.innerHTML = 'Copied!';
                setTimeout(() => {
                    copyBtn.innerHTML = 'Copy';
                }, 2000);
            });
        });
    };

    setupMobileMenu();
    setupCodeCopy();
});