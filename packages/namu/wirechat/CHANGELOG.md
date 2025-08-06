# WireChat Changelog 

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

---

## [Unreleased]
### Added
- Initial changelog setup.
- Placeholder for upcoming features.

---

## [v0.0.1] - 2024-12-8
### Added
- Introduced `WireChat` package with the following features:
  - Basic chat functionality for private conversations.
  - Group Chats functionality.
  - Smart Deletes for :
    * Conversations
    *  Messages
  - Messages: sending, receiving , viewing.
  - Published initial migrations for conversations and messages.
---

## [v0.0.4] - 2024-12-8
### Added
  - Issue template
  - MIT license 
  - CODEOWNERS file to assign reviewers automatically

---
  
## [v0.0.5] - 2024-12-11
### Fixed
- Fixed unread messages dot not appearing correctly.  
  **Note:** Running `php artisan view:clear` may be required to ensure the changes take effect.

---

## [v0.0.6] - 2024-12-16
### Fixed
- Fixed error caused by missing import in chat blade due to typo.  
  **Note:** Running `php artisan view:clear` may be required to ensure the changes take effect.

---

## [v0.0.7] - 2024-12-20
### Added
- Introduced `Actor` and `Actionable` traits for improved polymorphic relationship handling.
  - Added tests for `Actor` and `Actionable` traits.

### Fixed
- Resolved a bug that caused incorrect retrieval of the authenticated participant due to a missing `conversation_id` filter during retrieval.

### Updated
- Refactored migrations to use `unsignedBigInteger`. All polymorphic relationships now use unsignedBigInteger by default to maintain consistency across databases. This resolves a type mismatch issue found during testing on PostgreSQL.

**Note:** Running `php artisan view:clear` may be required to ensure the changes take effect.

