# Pet Adoption Platform (COMP3013 Database Management Systems)

COMP3013 24F Group 13 课程项目：基于 PHP + MySQL 的宠物领养平台，包含用户端、领养/寄养/捐赠流程以及后台管理模块。

## 仓库内容

| 路径 | 说明 |
|------|------|
| `COMP3013_24F_Group13_pet_adoptionCode/` | PHP 源代码（用户端、`admin/` 后台、`shop/`、CSS/JS/图片） |
| `COMP3013_24F_Group13_petAdoption.sql` | 数据库结构与示例数据（与 `.../sql/pet_adoption.sql` 相同） |
| `COMP3013_24F_Group13_ERprogram.png` | ER 图 |
| `COMP3013_24F_Group13_PetAdoptionPlatformPPT.pptx` | 项目演示文稿 |
| `COMP3013_24F_Group13_report.docx` | 项目报告 |
| `COMP3013_24F_Group13_Demo.MOV` | 功能演示视频；约 981MB，作为 **Release 附件**提供，不在 git 仓库中 |

## 本地运行

1. 创建 MySQL 数据库 `pet_adoption`，导入 SQL 文件：
   ```bash
   mysql -u root -p pet_adoption < COMP3013_24F_Group13_petAdoption.sql
   ```
2. 修改 `COMP3013_24F_Group13_pet_adoptionCode/inc/conn.php` 中的数据库连接配置。
3. 使用 XAMPP / Apache + PHP 将代码目录作为站点根目录访问。

数据库结构包含 `users`、`admin`、`animals_table`、`animals_order`、`donation`、`fosters`、`activities` 等表。
