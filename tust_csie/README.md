# 天津科技大学计算机学院社团报名网站
本项目为天津科技大学计算机学院计算机精英协会维护，为计算机学院社团报名使用
注意：基于本项目源码从事科研、论文、系统开发，"最好"在文中或系统中表明来自于本项目的内容和创意，否则所有贡献者可能会鄙视你和你的项目。使用本项目源码请尊重程序员职业和劳动。
## 简介
1. 使用materializecss设计风格(http://materializecss.com)
2. 使用php7开发，部分函数与php5并不兼容
3. 各社团可设置自己的问题，最少2个，最多4个。社团内各部门问题必须相同
4. 使用[PHPWORD](https://github.com/PHPOffice/PHPWord)，php zip扩展模块
## 数据库
数据库使用MySQL，PDO开发
### 表结构
#### communitys
|   字段名         |  数据类型  | 长度  | 主键 | 非空 |          描述     |
|-----------------|----------|------|:----:|:---:|:----------------:|
| id              |  INT     |  10  |  是  |  是  |  自增，社团id      |
| name            |  CHAR    |  20  |      |  是  |  社团名称         |
| description     |  VARCHAR |  210 |      |  是  |  社团介绍         |
| is_take_in      |  TINYINT |  1   |      |  是  |  是否可以报名      |
| information1    |  CHAR    |  80  |      |  是  |  报名时需填写的信息 |
| information2    |  CHAR    |  80  |      |  是  |  报名时需填写的信息 |
| information3    |  CHAR    |  20  |      |  否  |  报名时需填写的信息 |
| information4    |  CHAR    |  20  |      |  否  |  报名时需填写的信息 |
社团信息，`is_take_in`为社团是否可以报名，可以报名为`1`。

#### departments
|   字段名         |  数据类型  | 长度  | 主键 | 非空 |          描述     |
|-----------------|----------|------|:----:|:---:|:----------------:|
| id              |  INT     |  10  |  是  |  是  |  自增，部门id      |
| department_name |  CHAR    |  20  |      |  是  |  部门名称         |
| description     |  VARCHAR |  200 |      |  是  |  部门介绍         |
| community_id    |  INT     |  10  |      |  是  |  部门对应的社团id  |
社团内部门信息，`community_id`对应社团的`communitys.id`值，必须填写。

#### register_informations
|   字段名         |  数据类型  | 长度  | 主键 | 非空 |          描述     |
|-----------------|----------|------|:----:|:---:|:----------------:|
| id              |  INT     | 10   |  是  |  是  |  自增，社团id      |
| student_id      |  CHAR    | 10   |      |  是  |  天津科技大学学号   |
| student_name    |  VARCHAR | 20   |      |  是  |  姓名            |
| phone_num       |  CHAR    | 15   |      |  是  |  手机号码         |
| email           |  VARCHAR | 100  |      |  是  |  email           |
| sex             |  CHAR    | 2    |      |  是  |  性别            |
| nation          |  CHAR    | 20   |      |  是  |  民族            |
| political_status|  CHAR    | 20   |      |  是  |  政治面貌         |

#### users

