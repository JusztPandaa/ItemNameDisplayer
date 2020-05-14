# ItemNameDisplayer

Any item on the ground will have its name float above it. Custom names are supported. Good for factions servers.

# Usage

1. Download plugin.
2. Put it in the 'Plugins' folder.
3. Run or restart your server.

4. Edit config to change up formats and to disable certain items.

# Features
### Current Features:
* Editable format.
* Ability to disable certain item display names.
* Ability to disable certain worlds from displaying item names.



### Planned Addons:
* Multi language support.
# Config

```
config-version: 3
# Displays the name of items on the groud.
# DM Dapro#3132 if you need any help.


# Edit the name format use '§' for colors.
# {name} - Name of the item.
# {count} - Amount of the item.
display-format: '{name} x{count}'


# Edit all the worlds that you dont want item names to be displayed
disabled-worlds: 
- 'ExampleWorld'


# List all the items you dont want names to be displayed. Use item id's.
disabled-items: []
```
\
\
Explanation:
| Setting | Description |
| --- | --- |
| `config-version` | DO NOT TOUCH. If changed, the config will be reset. |
| `display-format` | Edit the format of the floating text above every item on the ground. |
| `disabled-worlds` | Item names will not display in the worlds listed here. |
| `disabled-items` | Items listed here will not have their names float above them. |

# Permissions

There are no permissions for this plugin.

# Ideas

Have any ideas for this plugin?
Send your ideas to Dapro#3132 on Discord!

# Support

Need help?
Contact Dapro#3132 on Discord.
