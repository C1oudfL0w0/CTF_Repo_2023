import re
import string

# 定义正则表达式
pattern = r'^[a-zA-Z0-9!@#$%^&_-]+$'

# 获取符合正则表达式的字符
matching_chars = ''.join(char for char in string.printable if re.match(pattern, char))

# 打开文件并写入符合正则表达式的字符
with open('matching_chars.txt', 'w') as file:
    file.write(matching_chars)

print("文本文件已生成。")