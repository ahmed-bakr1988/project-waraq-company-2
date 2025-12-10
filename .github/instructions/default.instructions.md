# Copilot repository custom instructions

About this repository

This repository contains the Waraq Company project. When Copilot runs a review on pull requests, it should focus on code quality, correctness, security issues, and tests. Some PRs previously failed to be reviewed by Copilot; adding these repository-level instructions helps Copilot understand the review scope and file types to consider.

Review scope

- Primary: JavaScript/TypeScript, HTML, CSS, and configuration files used by the project.
- Exclude: Large binary files, generated build artifacts (dist/, build/), and vendor/ or node_modules/.
- For templates or localization files (e.g., *.json, *.yml), provide basic correctness checks only.

How to write review comments

- Be concise and actionable.
- Point to exact lines or code blocks when suggesting fixes.
- When suggesting code changes, include minimal reproducible code snippets.

If you can't run a full review

- Explain why (unsupported file types, permission error, missing instructions) and provide steps the maintainer can take to allow a full review.

Arabic (شرح موجز للمراجعات)

هذا الملف يوجّه GitHub Copilot لإجراء مراجعات للـ pull requests في هذا المستودع. يطلب من Copilot التركيز على نوع الملفات الأساسية، تجاهل الملفات الكبيرة والمولّدة، وتقديم ملاحظات مباشرة وقابلة للتنفيذ.
