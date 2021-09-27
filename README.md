# ShuffleWord

###### Simple plugin to earn rewards for the first player who finds the random word.

## Config
```yaml
#     _____ _            __  __ _   __          __           _ 
#    / ____| |          / _|/ _| |  \ \        / /          | |
#   | (___ | |__  _   _| |_| |_| | __\ \  /\  / /__  _ __ __| |
#    \___ \| '_ \| | | |  _|  _| |/ _ \ \/  \/ / _ \| '__/ _` |
#    ____) | | | | |_| | | | | | |  __/\  /\  / (_) | | | (_| |
#   |_____/|_| |_|\__,_|_| |_| |_|\___| \/  \/ \___/|_|  \__,_|
#                                                              
# 

# Time between 2 events in seconds
timer: 60
# Rewards commands
rewards:
  - "give {player} 1 64"
# Message broadcasted
broadcast: "§6§l[§f!!!§6]§r Be the first to find the matching word to win §664 stone §f! Word: §6{word} §f!"
broadcast_win: "§6§l[§f!!!§6]§r The player §6{player} §fwas the first to find the word §6{word} §f!"
words:
  - "minecraft"
  - "pocketmine"
  - "microsoft"
```
