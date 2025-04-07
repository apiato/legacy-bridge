[//]: # (<p align="center">)
[//]: # (   <a href="https://github.com/apiato/legacy-bridge/actions/workflows/tests.yaml">)
[//]: # (      <img src="https://img.shields.io/github/actions/workflow/status/apiato/legacy-bridge/tests.yaml?label=tests" alt="tests status">)
[//]: # (   </a>)
[//]: # (   <a href="https://codecov.io/gh/apiato/legacy-bridge">)
[//]: # (      <img src="https://img.shields.io/codecov/c/github/apiato/legacy-bridge?token=c6e0b5g9GH" alt="code coverage"/>)
[//]: # (   </a>)
[//]: # (   <br>)
[//]: # (</p>)

# Apiato Legacy Bridge
Legacy Bridge provides a set of traits and classes to help you gradually upgrade your codebase.
You can use these traits in your existing classes
to maintain compatibility with the new version of Apiato while you refactor your code.

## Installation

```bash
composer require apiato/legacy-bridge dev-latest
```

## Usage
> We suggest you copy the traits and classes you need to your codebase instead of using them directly from the package.

Backward compatibility features are grouped based on the Apiato version they support.

You can find each versions documentation in the following directories:

| From | To  | Documentation            |
|------|-----|--------------------------|
| v12  | v13 | [v12](src/v12/readme.md) |
