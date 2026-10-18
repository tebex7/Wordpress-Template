# Mystic Morocco Roads WordPress Theme

## Run locally

Requirements: Docker with the Compose plugin.

Start WordPress, MariaDB, and the Mystic Morocco Roads theme:

```sh
docker compose up -d
```

In GitHub Codespaces, open the forwarded port 8080 URL (`https://${CODESPACE_NAME}-8080.${GITHUB_CODESPACES_PORT_FORWARDING_DOMAIN}`). Outside Codespaces, open [http://localhost:8080](http://localhost:8080). The setup service installs WordPress, updates its site URLs, and activates Mystic Morocco Roads automatically. Get the generated admin password with:

```sh
docker compose logs setup
```

Sign in at the same site URL plus `/wp-admin` with username `voyago` and the password shown in the setup log. Theme edits in `voyago/` are immediately available in the running site.

## Edit the theme

- The supplied logo is mounted from `Black-and-White-Simple-Monoline-Camping-Camping-Logo-2048x1152.png` and displayed in the shared header/footer. The **Mystic Morocco Roads** Customizer logo control can replace it; WordPress **Site Identity → Logo** remains supported as an override.
- Edit homepage copy, images, routes, contact channels, social links, and Tripadvisor settings under **Appearance → Customize → Mystic Morocco Roads**.
- Edit the **About Us** and **Contact** pages from **Pages**. The Tours navigation points to the `/tours/` archive; each tour opens the same editable single-tour template.
- Add or edit route entries under **Tours**. Each uses the shared tour template and has fields for route, itinerary, highlights, included/excluded details, photos, and FAQs.
- Edit the existing Privacy Policy page and the Terms and Cancellation Policy pages in WordPress. They all use the shared **Policy Document** template.
- Demo routes are labeled as illustrative. Replace their route details and images with confirmed business information before presenting them as actual offerings.
- Tripadvisor is not connected until the real business listing URL and, if available, an official widget URL are set in the Customizer. No review text is fabricated.

Image and font source/licensing details are in [voyago/ATTRIBUTION.md](voyago/ATTRIBUTION.md).

The theme emits Organization and WebSite structured data with the configured logo, and WordPress exposes its sitemap at `/wp-sitemap.xml`. For Google Search, publish the site on a public domain, verify that domain in Google Search Console, and submit the sitemap. A private Codespaces URL is not a production search listing, and Google controls whether and when a logo appears in results.

Stop the containers without deleting the site or database:

```sh
docker compose down
```

This Compose configuration is for local development only. Its fallback database passwords are not suitable for a publicly exposed or production site. WordPress files and database contents persist in Docker volumes.