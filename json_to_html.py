import json

with open('trivy-report.json') as f:
    data = json.load(f)

html = """
<html>
<head>
<title>Trivy Vulnerability Report</title>
<style>
body { font-family: Arial; margin: 20px; }
table { border-collapse: collapse; width: 100%; }
th, td { border: 1px solid #ddd; padding: 8px; }
th { background-color: #333; color: white; }
tr:nth-child(even){background-color: #f2f2f2;}
h1 { color: #333; }
</style>
</head>
<body>
<h1>Trivy Vulnerability Report</h1>
<table>
<tr>
<th>Target</th><th>Vulnerability ID</th><th>Severity</th><th>Package</th>
<th>Installed Version</th><th>Fixed Version</th><th>Title</th>
</tr>
"""

for result in data.get("Results", []):
    target = result.get("Target", "")
    for vuln in result.get("Vulnerabilities", []):
        html += f"<tr><td>{target}</td><td>{vuln['VulnerabilityID']}</td><td>{vuln['Severity']}</td><td>{vuln['PkgName']}</td><td>{vuln['InstalledVersion']}</td><td>{vuln['FixedVersion']}</td><td>{vuln['Title']}</td></tr>"

html += "</table></body></html>"

with open('trivy-report.html', 'w') as f:
    f.write(html)

