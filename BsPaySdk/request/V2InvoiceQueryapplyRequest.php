<?php

namespace BsPaySdk\request;

use BsPaySdk\enums\FunctionCodeEnum;

/**
 * 发票开具状态查询
 *
 * @author sdk-generator
 * @Description
 */
class V2InvoiceQueryapplyRequest extends BaseRequest
{

    /**
     * 请求流水号
     */
    private $reqSeqId;
    /**
     * 请求时间
     */
    private $reqDate;
    /**
     * 汇付商户号
     */
    private $huifuId;

    public function getFunctionCode()
    {
        return FunctionCodeEnum::$V2_INVOICE_QUERYAPPLY;
    }


    public function getReqSeqId()
    {
        return $this->reqSeqId;
    }

    public function setReqSeqId($reqSeqId)
    {
        $this->reqSeqId = $reqSeqId;
    }

    public function getReqDate()
    {
        return $this->reqDate;
    }

    public function setReqDate($reqDate)
    {
        $this->reqDate = $reqDate;
    }

    public function getHuifuId()
    {
        return $this->huifuId;
    }

    public function setHuifuId($huifuId)
    {
        $this->huifuId = $huifuId;
    }

}
