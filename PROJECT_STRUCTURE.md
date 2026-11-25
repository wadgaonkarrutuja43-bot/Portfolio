# Project Structure

## Original source layout

```text
portfolio/
├── index.php
├── process.php
└── Resume.pdf
```

| File | Responsibility |
|---|---|
| `index.php` | Database connection, project SELECT query, navigation, hero, about, skills, project cards, contact form, styling and animation initialization |
| `process.php` | MySQL connection, POST form handling, input escaping, contact insertion and success redirect |
| `Resume.pdf` | Resume linked from the homepage |

## Documentation to add at the root

| File | Purpose |
|---|---|
| README.md | Overview and setup |
| ARCHITECTURE.md | Components and data flow |
| PROJECT_STRUCTURE.md | File responsibilities |
| CONTRIBUTING.md | Development workflow |
| CHANGELOG.md | Documented feature baseline |
| .env.example | Proposed environment settings |

The supplied archive contains no separate CSS or JavaScript source files, dependency manifest, SQL export or test suite. Styles and initialization scripts are embedded in the homepage; libraries are loaded externally.
