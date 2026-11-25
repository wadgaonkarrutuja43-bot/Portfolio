# Contributing

## Setup

Follow the README to run Apache, PHP and MySQL locally. Use a local database and test records, not real visitor messages.

## Workflow

1. Fetch and synchronize the correct GitHub repository before editing.
2. Create a feature branch (`git switch -c feature/your-change`).
3. Make focused changes and test them locally.
4. Review `git status` and stage only intended files.
5. Commit with a descriptive message, push the branch and open a pull request if collaborating.

## Guidelines

- Keep the responsive layout and existing navigation working.
- Keep database field names consistent with PHP queries.
- Test project cards, empty results, contact submission and resume links.
- Update documentation when behavior or setup changes.
- Do not commit real database credentials, private contact records, `.env` files or unnecessary generated files.
- Review the resume before public distribution.
- Prefer prepared statements and escaped output when modifying database logic.

## Suggested commit messages

- `feat: add portfolio project filter`
- `fix: correct social link`
- `docs: update local setup instructions`
