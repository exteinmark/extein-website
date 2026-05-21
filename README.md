# Extein — Sitio Web Corporativo

**MSP Empresarial en Monterrey | extein.com.mx**  
Soporte IT, Cloud, Redes, Seguridad, Infraestructura y más.

---

## Stack

| Capa | Tecnología |
|---|---|
| Frontend | HTML5 semántico, CSS3 modular, JavaScript vanilla |
| Tipografía | Plus Jakarta Sans (headings) + Inter (body) via Google Fonts |
| Formularios | Formspree (`mojrbdrw`) → ventas@extein.com.mx |
| SEO | Schema.org JSON-LD, Open Graph, meta geo, sitemap.xml |
| Deploy | GitHub → Webhook → Hostinger auto-deploy |

---

## Estructura del proyecto

```
extein-website/
├── index.html          # Página principal (SPA)
├── sitemap.xml         # Mapa del sitio para Google
├── robots.txt          # Directivas para crawlers
├── .htaccess           # Gzip, cache, HTTPS redirect, headers
├── .gitignore
├── README.md
└── logos/
    ├── icon-transparent.png        # Ícono Extein (navbar + favicon)
    ├── letras-transparent.png      # Logotipo letras (navbar)
    ├── div-logo-it-essentials.png  # Logo división IT
    ├── div-logo-cloud-hosting.png  # Logo división Cloud
    ├── div-logo-security.png       # Logo división Security
    ├── div-logo-network.png        # Logo división Network
    ├── div-logo-pro-systems.png    # Logo división Pro Systems
    ├── div-logo-gaming.png         # Logo división Gaming
    ├── div-logo-smart.png          # Logo división Smart
    ├── div-logo-marketing.png      # Logo división Marketing
    ├── div-logo-av-projects.png    # Logo división AV
    ├── div-logo-infraestructura.png# Logo división Infraestructura
    └── div-logo-mining-crypto.png  # Logo división Mining
```

---

## Deploy

### Automático (recomendado)
1. Hacer cambios al código
2. Desde `C:\extein-website\`, ejecutar `deploy.ps1`
3. GitHub recibe el push → Webhook → Hostinger actualiza `public_html` automáticamente

### Manual (Hostinger File Manager)
1. Descargar ZIP con todos los archivos
2. En Hostinger → hPanel → File Manager → `public_html`
3. Subir ZIP → Extraer → Verificar que `index.html` esté en la raíz

---

## Contacto

- 📱 WhatsApp: +52 81 2897 8162  
- ✉️ ventas@extein.com.mx  
- 📍 Monterrey · San Pedro Garza García · Saltillo

---

© 2025 Extein. Todos los derechos reservados.
