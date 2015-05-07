<?php
/**
 * 系统配置
 */
return array(
    
    /* 模块相关配置 */
    'DEFAULT_MODULE'     => 'Home',

    /* URL配置 */
    'URL_CASE_INSENSITIVE'  => true,
    'URL_MODEL'             => 1,

    /* 数据库配置 */
    'DB_TYPE'   => '[DB_TYPE]', // 数据库类型
    'DB_HOST'   => '[DB_HOST]', // 服务器地址
    'DB_NAME'   => '[DB_NAME]', // 数据库名
    'DB_USER'   => '[DB_USER]', // 用户名
    'DB_PWD'    => '[DB_PWD]',  // 密码
    'DB_PORT'   => '[DB_PORT]', // 端口
    'DB_PREFIX' => '[DB_PREFIX]', // 数据库表前缀

    /* 点语法默认解析 */
    'TMPL_VAR_IDENTIFY'     => 'array',
    
    'SUPER_ADMINI' => '[SUPER_ADMINI]'
);