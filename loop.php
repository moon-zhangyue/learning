<?php
/**
 * Created by PhpStorm.
 * Author: SpiRit-Moon
 * Time: 2022/1/26 15:25
 * Module: loop.php
 * 快乐存心底❤
 */

class Loop
{
    /**
     * 取得当前深度的筛选串
     * @param string $sField
     * @param int $nDepth 当前遍历数组深度
     * @return string
     */
    static function getFields($sField, $nDepth = 1)
    {
        $arrParts = explode('.', $sField, $nDepth + 1);
        if (count($arrParts) > 1 && count($arrParts) > $nDepth) {
            array_pop($arrParts);
        }
        $sFieldsOfTheDepth = implode('.', $arrParts);

        return $sFieldsOfTheDepth;
    }


    /**
     * 取得字符串的总深度
     * @param string $sPath
     * @return int
     */
    static function getTotalDepth($sPath)
    {
        $nFieldTotalDepth = substr_count($sPath, '.') + 1;
        return $nFieldTotalDepth;
    }


    /**去除多维数组中空子数组
     * @param $arrayInput
     * @return mixed
     */
    static function removeEmptyArray(&$arrayInput)
    {
        foreach ($arrayInput as $sInputKey => $arrInputValue) {

            if (empty($arrInputValue)) {
                unset($arrayInput[$sInputKey]);
            } elseif (is_array($arrInputValue)) {
                self::removeEmptyArray($arrInputValue);
            } else {
                break;
            }
        }

        return $arrayInput;
    }


    /**返回字符串的第一个单词 如: A.B.C 中的A
     * @param string $sPath
     * @return string
     */
    static function handlePath($sPath)
    {
        $nFirstPath = strpos($sPath, '.');
        if ($nFirstPath) {
            $sFirstPath = substr($sPath, 0, $nFirstPath);
        } else {
            return $sPath;
        }

        return $sFirstPath;
    }


    /**
     * 递归比较子数组和筛选数组的路径串, 并筛选
     * @param array $arrSubArray    子数组
     * @param int $nDepth           实际数组下标深度
     * @param array $arrFields      筛选数组
     * @param string $sPartPath     源数组到子数组的实际路径串
     * @param string $sMethodSource 方法名 'exceptFields', 'onlyFields'
     * @return array 返回经过字段筛选后的数组
     */
    static function pathFilter(&$arrSubArray, $nDepth, $arrFields, $sPartPath, $sMethodSource)
    {
        //遍历筛选数组
        foreach ($arrFields as $sField) {
            //获取当前深度的筛选串路径
            $sTheDepthFields = self::getFields($sField, $nDepth);
            //获取筛选串的总长度, 用于在删除数组键值对时作为标记
            $sTheTotalDepthField = self::getTotalDepth($sField);
            //获取当前筛选串的深度, 用于在删除时和$sTheDepthFields作比较
            $nNowDepthFields = self::getTotalDepth($sTheDepthFields);
            //判断当前筛选串第一个字符是不是'*'
            $bIsWildCard = strpos($sField, '*') == 0 ? true : false;
            //遍历当前需要筛选的数组
            foreach ($arrSubArray as $sSubKey => $arrArray) {
                //拼接当前实际数组路径
                $sPartPath .= '.' . $sSubKey;
                $sPartPath = ltrim($sPartPath, ".");
                //获取当前实际数组路径的第一个单词
                $sFirstPartPath = self::handlePath($sPartPath);
                //获取当前实际数组路径的总深度, 用于在删除数组键值对时作为标记判断
                $sTheTotalDepthPartPath = self::getTotalDepth($sPartPath);
                //把当前筛选串第一个字母是'*'和当前实际数组路径的第一个单词进行替换
                if ($bIsWildCard) {
                    $sTheDepthFields = str_replace('*', $sFirstPartPath, $sTheDepthFields);
                }
                //对当前的筛选串路径和实际数组路径进行比较
                $bJudge = $sTheDepthFields == $sPartPath ? true : false;

                switch ($sMethodSource) {
                    case 'exceptFields':

                        if ($bJudge && ($sTheTotalDepthPartPath == $sTheTotalDepthField)) {
                            unset($arrSubArray[$sSubKey]);
                            //将当前实际数组路径删除数组的键 例：A.B => A
                            $sPartPath = substr($sPartPath, 0, strlen($sPartPath) - strlen($sSubKey) - 1);
                            continue 2;
                        } elseif (is_array($arrArray)) {
                            $nDepth++;
                            $arrSubArray[$sSubKey] = self::pathFilter($arrArray, $nDepth, $arrFields, $sPartPath, $sMethodSource);
                        }

                        break;
                    case 'onlyFields':

                        if (!$bJudge && ($nNowDepthFields == $sTheTotalDepthPartPath)) {
                            unset($arrSubArray[$sSubKey]);
                            $sPartPath = substr($sPartPath, 0, strlen($sPartPath) - strlen($sSubKey) - 1);
                            continue 2;
                        } elseif (is_array($arrArray)) {
                            $nDepth++;
                            $arrSubArray[$sSubKey] = self::pathFilter($arrArray, $nDepth, $arrFields, $sPartPath, $sMethodSource);
                            //处理当前实际总的数组路径小于总的筛选串路径情况 例如: 筛选串 : *.META    当前总的数组路径 : ['K' => '1222']
                        } elseif ($sTheTotalDepthField > $sTheTotalDepthPartPath) {
                            unset($arrSubArray[$sSubKey]);
                        }
                        //这里对当前空数组进行删除操作
                        self::removeEmptyArray($arrSubArray);

                        break;
                }
                //针对于遍历完一个子数组, 将子数组第一个单词给还原为'*' | ' ' | '原单词'
                if (strlen($sPartPath) > strlen($sSubKey)) {
                    $sPartPath = substr($sPartPath, 0, strlen($sPartPath) - strlen($sSubKey) - 1);
                } else {
                    $sPartPath = '';
                }
//针对于遍历完一个子数组, 将筛选串第一个单词给还原为'*' | ' ' | '原单词'
                if ($bIsWildCard) {
                    $sFirstFields    = self::handlePath($sTheDepthFields);
                    $sTheDepthFields = str_replace($sFirstFields, '*', $sTheDepthFields);
                }
            }
        }

        return $arrSubArray;
    }


    /**
     * 筛选数组中的字段，仅保留指定的字段
     * @param array $arrArray         要筛选的源数组
     * @param string|array $arrFields 如：'*.meta.user_id'
     */
    public static function onlyFields(&$arrArray, $arrFields)
    {
        $arrFields = (array)$arrFields;
        self::pathFilter($arrArray, 1, $arrFields, '', 'onlyFields');
        self::removeEmptyArray($arrArray);
    }


    /**
     * 筛选数组中的字段，除了指定的字段，其它字段全部保留
     * @param array $arrArray         要筛选的源数组
     * @param string|array $arrFields 如：['*.meta.password', '*.deleted_at']
     */
    public static function exceptFields(&$arrArray, $arrFields)
    {
        $arrFields = (array)$arrFields;
        self::pathFilter($arrArray, 1, $arrFields, '', 'exceptFields');
        self::removeEmptyArray($arrArray);
    }
}