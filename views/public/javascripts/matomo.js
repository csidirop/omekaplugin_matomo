jQuery(document).ready(function () {
    var domain = document.domain; // TODO: temp solution
    var url = new URL(window.location.href); // TODO: temp solution
    var domainAndPath = `${url.hostname}/${url.pathname.split('/').filter(Boolean)[0] || ''}`;

    // <!-- Matomo -->
    var _paq = window._paq = window._paq || [];
    /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
    if(trackingAllSubdomains) { _paq.push(["setCookieDomain", "*." + domain]); };                       // tracking-all-subdomains
    if(trackingGroupByDomain) { _paq.push(["setDocumentTitle", domain + "/" + document.title]); };      // tracking-group-by-domain
    if(trackingAllAliases) { _paq.push(["setDomains", ["*." + domainAndPath]]);};                       // tracking-all-aliases
    if(trackingVisitorCvCheck) { _paq.push(["setCustomVariable", 1, trackingVisitorCvCheck.NAME, trackingVisitorCvCheck.WERT, "visit"]); }; // tracking-visitor-cv-check
    if(trackingDoNotTrack) { _paq.push(["setDoNotTrack", true]); };                                     // tracking-do-not-track
    if(trackingDisableCookies) { _paq.push(["disableCookies"]); };                                      // tracking-do-not-track
    if(trackingRequireConsentForCampaignTracking) { _paq.push(["disableCampaignParameters"]); };        // tracking-require-consent-for-campaign-tracking 
    if(trackingCustomCampaignQueryParamsCheck) {                                                        // tracking-custom-campaign-query-params-check
        _paq.push(["setCampaignNameKey", trackingCustomCampaignQueryParamsCheck.NAME]);
        _paq.push(["setCampaignKeywordKey", trackingCustomCampaignQueryParamsCheck.PARAMETER]);
    }
    _paq.push(['trackPageView']);
    _paq.push(['enableLinkTracking']);
    (function() {
        var u=matomoURL;
        _paq.push(['setTrackerUrl', u+'matomo.php']);
        _paq.push(['setSiteId', matomoSiteId]);
        var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
        g.async=true; g.src=u+'matomo.js'; s.parentNode.insertBefore(g,s);
    })();
    // <!-- End Matomo Code -->

    if(trackingNoscript) { // tracking-noscript
        const noscriptEle = document.createElement('noscript');
        const paragraphEle = document.createElement('p');
        const imgEle = document.createElement('img');

        // Set attributes for the <img> element
        imgEle.setAttribute('referrerpolicy', 'no-referrer-when-downgrade');
        imgEle.setAttribute('src', `${matomoURL}/matomo.php?idsite=${matomoSiteId}&rec=1`);
        imgEle.setAttribute('style', 'border:0;');
        imgEle.setAttribute('alt', '');

        paragraphEle.appendChild(imgEle);
        noscriptEle.appendChild(paragraphEle);
        document.body.appendChild(noscriptEle);
    }
});
