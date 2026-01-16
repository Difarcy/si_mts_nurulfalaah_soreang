const timers = new WeakMap();

function getEmbedUrlWithParams(embedUrl, params) {
    const url = new URL(embedUrl, window.location.origin);
    Object.entries(params).forEach(([k, v]) => url.searchParams.set(k, String(v)));
    return url.toString();
}

function startPreview(container) {
    const embedUrl = container.getAttribute('data-embed-url') || '';
    if (!embedUrl) return;

    if (timers.has(container)) {
        clearTimeout(timers.get(container));
    }

    const timerId = window.setTimeout(() => {
        const iframeContainer = container.querySelector('[data-video-iframe]') || container.querySelector('.iframe-container');
        const thumbnail = container.querySelector('[data-video-thumbnail]') || container.querySelector('.thumbnail-link');
        const playOverlay = container.querySelector('[data-video-overlay]') || container.querySelector('.play-icon-overlay');

        if (!iframeContainer) return;

        if (!iframeContainer.querySelector('iframe')) {
            const autoplayUrl = getEmbedUrlWithParams(embedUrl, {
                autoplay: 1,
                mute: 1,
                controls: 1,
                modestbranding: 1,
                rel: 0,
            });

            const iframe = document.createElement('iframe');
            iframe.src = autoplayUrl;
            iframe.className = 'w-full h-full';
            iframe.frameBorder = '0';
            iframe.allow = 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture';
            iframe.allowFullscreen = true;
            iframeContainer.appendChild(iframe);
        }

        iframeContainer.classList.remove('hidden');

        if (thumbnail) {
            thumbnail.style.opacity = '0';
            thumbnail.style.pointerEvents = 'none';
        }

        if (playOverlay) {
            playOverlay.classList.add('opacity-0');
        }
    }, 1000);

    timers.set(container, timerId);
}

function stopPreview(container) {
    if (timers.has(container)) {
        clearTimeout(timers.get(container));
        timers.delete(container);
    }

    const iframeContainer = container.querySelector('[data-video-iframe]') || container.querySelector('.iframe-container');
    const thumbnail = container.querySelector('[data-video-thumbnail]') || container.querySelector('.thumbnail-link');
    const playOverlay = container.querySelector('[data-video-overlay]') || container.querySelector('.play-icon-overlay');

    if (thumbnail) {
        thumbnail.style.opacity = '1';
        thumbnail.style.pointerEvents = 'auto';
    }

    if (iframeContainer) {
        iframeContainer.classList.add('hidden');
        iframeContainer.innerHTML = '';
    }

    if (playOverlay) {
        playOverlay.classList.remove('opacity-0');
    }
}

function isLeavingContainer(container, relatedTarget) {
    if (!relatedTarget) return true;
    return !container.contains(relatedTarget);
}

document.addEventListener('mouseover', (e) => {
    const container = e.target.closest('[data-video-hover-preview]');
    if (!container) return;
    if (!isLeavingContainer(container, e.relatedTarget)) return;
    startPreview(container);
});

document.addEventListener('mouseout', (e) => {
    const container = e.target.closest('[data-video-hover-preview]');
    if (!container) return;
    if (!isLeavingContainer(container, e.relatedTarget)) return;
    stopPreview(container);
});

