# WhereRU Server Deployment

## Quick Start

### 1. Start PHP Server
```bash
cd /path/to/whereru-server-php/_PROD/api
php -S localhost:8000
```

If port 8000 is in use:
```bash
lsof -nP -iTCP:8000 -sTCP:LISTEN
kill <PID>
```

### 2. Start Caddy (Optional - for local development)
```bash
cd /path/to/whereru-server-php
caddy run
```

### 3. Start Cloudflare Tunnel
```bash
cd /path/to/whereru-server-php
cloudflared tunnel --config config.yml run
```

## Database Setup

Connect to local database:
- Host: localhost
- Database: pushchat
- Username: [your_db_username]
- Password: [your_db_password]

## Push Processor

```bash
cd /path/to/whererupushprod
php push.php
```

## Cloudflare Configuration

Domain: https://your-domain.uk
API Endpoint: https://api.your-domain.uk/api.php

### Tunnel Setup
```bash
cloudflared tunnel login
cloudflared tunnel create [tunnel_name]
cloudflared tunnel route dns [tunnel_name] api.your-domain.uk
```

## Update Server Configuration

### Via GitHub CLI
```bash
gh auth login
gh gist edit [GIST_ID] --filename config.txt
```

### Via API
```bash
curl -X PATCH \
  -H "Authorization: token [YOUR_GITHUB_TOKEN]" \
  -H "Accept: application/vnd.github+json" \
  https://api.github.com/gists/[GIST_ID] \
  -d '{
    "files": {
      "config.txt": {
        "content": "your-new-connection-string-here"
      }
    }
  }'
```

## Configuration Files

### config.yml (Cloudflare Tunnel)
```yaml
tunnel: [TUNNEL_UUID]
credentials-file: /path/to/.cloudflared/[TUNNEL_UUID].json
ingress:
  - hostname: api.your-domain.uk
    service: http://localhost:8000
  - service: http_status:404
```

### Caddyfile
```
{
    auto_https off
}

:80 {
    reverse_proxy localhost:8000
}
```

## Setup Instructions

1. Replace placeholder values with your actual configuration:
   - `/path/to/whereru-server-php` - Your project path
   - `[your_db_username]` - Database username
   - `[your_db_password]` - Database password
   - `your-domain.uk` - Your actual domain
   - `[tunnel_name]` - Your Cloudflare tunnel name
   - `[TUNNEL_UUID]` - Your tunnel UUID
   - `[GIST_ID]` - Your GitHub gist ID
   - `[YOUR_GITHUB_TOKEN]` - Your GitHub token

2. Ensure all paths point to your actual file locations

3. Test the deployment by accessing your API endpoint
