<?php
namespace Database;

class DatabaseType
{
    const T_PRIMARY      = 'int(11) not null auto_increment';
    const T_STRING       = 'varchar(255)';
    const T_TEXT         = 'text';
    const T_INT          = 'int';
    const T_FLOAT        = 'float';
    const T_DECIMAL      = 'decimal';
    const T_DATE         = 'date';
    const T_DATE_TIME    = 'datetime';
    const T_TIME         = 'time';
    const T_BINARY       = 'blob';
    const T_BOOLEAN      = 'tinyint(1)';
}
