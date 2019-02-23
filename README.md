# php-sdk-aliyun

阿里云第三方PHP-SDK，目前维护者只有一人，出于项目需要与兴趣维护她。如果你有bug反馈欢迎提供issues，如果你对项目维护迭代有想法，也欢迎[@leander](mailto:leander@tchost.cn)。  

## 安装  

- composer安装  

```cli
composer require leander/aliyun-sdk
```

## 配置  

你应该创建/youdao-ai/src/conf.inc.php.example副本/youdao-ai/src/conf.inc.php：

```shell
cd youdao-ai
cp /src/conf.inc.php.example /src/conf.inc.php
```

### 配置项参照表如下：  

名称 | 别名 | 默认值 | 版本支持 | 备注  
------ | ------ | ------ | ------ | ------  
应用参数 | | | |  
API_SERV | api服务器 | <http://openapi.youdao.com/> | ~1.0 |  
APP_KEY | 应用编号 | | ~1.0 |  
SEC_KEY | 应用密钥 | | ~1.0 |  
HTTP参数 | | | |  
HTTP_TIMEOUT | 超时时间 | 10 | ~1.0 | 超过设定值（秒），超时失败  
API_PATH | 接口映射表 | | ~1.0 | 配置组，通常不需要修改  

## 文档  

请自行查阅官方文档，了解各接口作用：<https://ai.youdao.com/docs/doc-trans-api.s#p01>  
我们对接口名进行了抽象映射，接口目录如下：  

映射名 | 官方路径 | 别名 | 参数 | 描述 | 备注  
------ | ------ | ------ | ------ | ------ | ------  
trans | api | 自然语言翻译 | ... | ...  
sti | speechtransapi | 语音翻译 | ... | ...  
oti | ocrtransapi | ocr文档翻译 | ... | ...  

## 其他说明  

无