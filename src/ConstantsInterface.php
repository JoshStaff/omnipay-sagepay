<?php

namespace Omnipay\Opayo;

/**
 * A convenient place to put all the gateway constants,
 * for use in all classes.
 */

interface ConstantsInterface
{
    //
    // First the request constants.
    //

    /**
     * Flag whether to allow the gift aid acceptance box to appear for this
     * transaction on the payment page. This only appears if your vendor
     * account is Gift Aid enabled.
     */
    const ALLOW_GIFT_AID_YES = 1;
    const ALLOW_GIFT_AID_NO  = 0;

    /**
     * Supported 3D Secure values for Apply3DSecure.
     * 0: APPLY - If 3D-Secure checks are possible and rules allow,
     *      perform the checks and apply the authorisation rules.
     *      (default)
     * 1: FORCE - Force 3D-Secure checks for this transaction if
     *      possible and apply rules for authorisation.
     * 2: NONE - Do not perform 3D-Secure checks for this
     *      transaction and always authorise.
     * 3: AUTH - Force 3D-Secure checks for this transaction if
     *      possible but ALWAYS obtain an auth code, irrespective
     *      of rule base.
     *
     * @var integer
     */
    const APPLY_3DSECURE_APPLY  = 0;
    const APPLY_3DSECURE_FORCE  = 1;
    const APPLY_3DSECURE_NONE   = 2;
    const APPLY_3DSECURE_AUTH   = 3;

    /**
     * Supported AVS/CV2 values.
     *
     * 0: DEFAULT will use the account settings for checks and applying of rules.
     * 1: FORCE_CHECKS will force checks to be made.
     * 2: NO_CHECKS will force no checks to be performed.
     * 3: NO_RULES will force no rules to be applied.
     *
     * @var integer
     */
    const APPLY_AVSCV2_DEFAULT      = 0;
    const APPLY_AVSCV2_FORCE_CHECKS = 1;
    const APPLY_AVSCV2_NO_CHECKS    = 2;
    const APPLY_AVSCV2_NO_RULES     = 3;

    /**
     * Supported 3D Secure settings for a RESTful payments integration, used to override default account-level settings.
     *
     * - UseMSPSetting - Use default MySagePay settings.
     * - Force - Apply authentication even if turned off.
     * - ForceIgnoringRules - Apply authentication but ignore rules.
     * - Disable - Only use this if you intend to use an SCA Exemption
     *   (https://developer-eu.elavon.com/docs/opayo/3d-secure-authentication/sca-exemptions)
     */
    const REST_APPLY_3DSECURE_DEFAULT = 'UseMSPSetting';
    const REST_APPLY_3DSECURE_FORCE = 'Force';
    const REST_APPLY_3DSECURE_FORCE_IGNORING_RULES = 'ForceIgnoringRules';
    const REST_APPLY_3DSECURE_DISABLE = 'Disable';

    /**
     * Supported AVS CVS settings for a RESTful payments integration, used to overide default account-level settings
     *
     * - UseMSPSetting - Use defailt MySagePay settings.
     * - Force - Apply authentication even if turned off.
     * - ForceIgnoringRules - Apply authentication but ignore rules.
     * - Disable - Disable authentication and rules
     */
    const REST_APPLY_AVS_CVC_CHECK_DEFAULT = 'UseMSPSetting';
    const REST_APPLY_AVS_CVC_CHECK_FORCE = 'Force';
    const REST_APPLY_AVS_CVC_CHECK_FORCE_IGNORING_RULES = 'ForceIgnoringRules';
    const REST_APPLY_AVS_CVC_CHECK_DISABLE = 'Disable';

    /**
     * Flag whether to store a cardReference or token for multiple use.
     */
    const STORE_TOKEN_YES   = 1;
    const STORE_TOKEN_NO    = 0;

    /**
     * Flag whether to create a cardReference or token for the CC supplied.
     */
    const CREATE_TOKEN_YES   = 1;
    const CREATE_TOKEN_NO    = 0;

    /**
     * Profile for Opayo Server hosted forms.
     * - NORMAL for full page forms.
     * - LOW for use in iframes.
     */
    const PROFILE_NORMAL    = 'NORMAL';
    const PROFILE_LOW       = 'LOW';

    /**
     * The values for the AccountType field.
     * E – for ecommerce transactions (default)
     * M – for telephone (MOTO) transactions
     * C – for repeat transactions
     *
     * @var string
     */
    const ACCOUNT_TYPE_E = 'E';
    const ACCOUNT_TYPE_M = 'M';
    const ACCOUNT_TYPE_C = 'C';

    /**
     * The transaction type.
     * These will usually be returned in the response matching the
     * request.
     * @var string
     */
    const TXTYPE_PAYMENT        = 'PAYMENT';
    const TXTYPE_DEFERRED       = 'DEFERRED';
    const TXTYPE_AUTHENTICATE   = 'AUTHENTICATE';
    const TXTYPE_REMOVETOKEN    = 'REMOVETOKEN';
    const TXTYPE_TOKEN          = 'TOKEN';
    const TXTYPE_RELEASE        = 'RELEASE';
    const TXTYPE_AUTHORISE      = 'AUTHORISE';
    const TXTYPE_VOID           = 'VOID';
    const TXTYPE_ABORT          = 'ABORT';
    const TXTYPE_REFUND         = 'REFUND';
    const TXTYPE_REPEAT         = 'REPEAT';
    const TXTYPE_REPEATDEFERRED = 'REPEATDEFERRED';

    /**
     *
     */
    const SERVICE_SERVER_REGISTER   = 'vspserver-register';
    const SERVICE_DIRECT_REGISTER   = 'vspdirect-register';
    const SERVICE_REPEAT            = 'repeat';
    const SERVICE_TOKEN             = 'directtoken';
    const SERVICE_DIRECT3D          = 'direct3dcallback';
    const SERVICE_REST_MSK          = 'merchant-session-keys';
    const SERVICE_REST_TRANSACTIONS = 'transactions';
    const SERVICE_REST_INSTRUCTIONS = 'instructions';
    const SERVICE_REST_3D           = '3d-secure';
    const SERVICE_REST_3D_CHALLENGE = '3d-secure-challenge';

    /**
     * 0 = Do not send either customer or vendor emails
     * 1 = Send customer and vendor emails if addresses are provided
     * 2 = Send vendor email but NOT the customer email
     * If you do not supply this field, 1 is assumed and emails
     * are sent if addresses are provided.
     */
    const SEND_EMAIL_NONE = '0';
    const SEND_EMAIL_BOTH = '1';
    const SEND_EMAIL_VENDOR = '2';

    //
    // Then the response constants.
    //

    /**
     * There are a wide range of status codes across the different gatweay types
     * and in response to different types of request.
     * @var string
     */
    const OPAYO_STATUS_OK             = 'OK';
    const OPAYO_STATUS_OK_REPEATED    = 'OK REPEATED';
    const OPAYO_STATUS_PENDING        = 'PENDING';
    const OPAYO_STATUS_NOTAUTHED      = 'NOTAUTHED';
    const OPAYO_STATUS_REJECTED       = 'REJECTED';
    const OPAYO_STATUS_AUTHENTICATED  = 'AUTHENTICATED';
    const OPAYO_STATUS_REGISTERED     = 'REGISTERED';
    const OPAYO_STATUS_3DAUTH         = '3DAUTH';
    const OPAYO_STATUS_PPREDIRECT     = 'PPREDIRECT';
    const OPAYO_STATUS_ABORT          = 'ABORT';
    const OPAYO_STATUS_MALFORMED      = 'MALFORMED';
    const OPAYO_STATUS_INVALID        = 'INVALID';
    const OPAYO_STATUS_ERROR          = 'ERROR';

    /**
     * Raw values for AddressResult
     * @var string
     */
    const ADDRESS_RESULT_NOTPROVIDED    = 'NOTPROVIDED';
    const ADDRESS_RESULT_NOTCHECKED     = 'NOTCHECKED';
    const ADDRESS_RESULT_MATCHED        = 'MATCHED';
    const ADDRESS_RESULT_NOTMATCHED     = 'NOTMATCHED';

    /**
     * Raw values for PostCodeResult
     * @var string
     */
    const POSTCODE_RESULT_NOTPROVIDED   = 'NOTPROVIDED';
    const POSTCODE_RESULT_NOTCHECKED    = 'NOTCHECKED';
    const POSTCODE_RESULT_MATCHED       = 'MATCHED';
    const POSTCODE_RESULT_NOTMATCHED    = 'NOTMATCHED';

    /**
     * Raw values for CV2Result
     * @var string
     */
    const CV2_RESULT_NOTPROVIDED        = 'NOTPROVIDED';
    const CV2_RESULT_NOTCHECKED         = 'NOTCHECKED';
    const CV2_RESULT_MATCHED            = 'MATCHED';
    const CV2_RESULT_NOTMATCHED         = 'NOTMATCHED';

    /**
     * Raw values for AVSCV2
     * @var string
     */
    const AVSCV2_RESULT_ALLMATCH            = 'ALLMATCH';
    const AVSCV2_RESULT_SECURITY_CODE_ONLY  = 'SECURITY CODE MATCH ONLY';
    const AVSCV2_RESULT_ADDRESS_ONLY        = 'ADDRESS MATCH ONLY';
    const AVSCV2_RESULT_NO_DATA             = 'NO DATA MATCHES';
    const AVSCV2_RESULT_NOT_CHECKED         = 'DATA NOT CHECKED';

    /**
     * Raw values for GiftAidResult (Opayo Server only)
     * @var string
     */
    const GIFTAID_CHECKED_TRUE  = '1';
    const GIFTAID_CHECKED_FALSE = '0';

    /**
     * Raw results for 3DSecureStatus
     * @var string
     */
    const SECURE3D_STATUS_OK            = 'OK';
    const SECURE3D_STATUS_NOTCHECKED    = 'NOTCHECKED';
    const SECURE3D_STATUS_NOTAVAILABLE  = 'NOTAVAILABLE';
    const SECURE3D_STATUS_NOTAUTHED     = 'NOTAUTHED';
    const SECURE3D_STATUS_INCOMPLETE    = 'INCOMPLETE';
    const SECURE3D_STATUS_ATTEMPTONLY   = 'ATTEMPTONLY';
    const SECURE3D_STATUS_ERROR         = 'ERROR';
    const SECURE3D_STATUS_NOAUTH        = 'NOAUTH';
    const SECURE3D_STATUS_CANTAUTH      = 'CANTAUTH';
    const SECURE3D_STATUS_MALFORMED     = 'MALFORMED';
    const SECURE3D_STATUS_INVALID       = 'INVALID';

    /**
     * Possible 3DSecure statuses for a RESTful payment integration
     *
     * - Ok - Transaction request completed successfully
     * - Authenticated - 3-D Secure checks carried out and user authenticated correctly.
     * - NotChecked - 3-D Secure checks were not performed. This indicates that 3-D Secure was either switched off at
     *   the account level, or disabled at transaction registration with the apply3DSecure set to Disable.
     * - NotAuthenticated - 3-D Secure authentication checked, but the user failed the authentication.
     * - Error - Authentication could not be attempted due to data errors or service unavailability in one of the
     *   parties involved in the check.
     * - CardNotEnrolled - This means that the card is not in the 3-D Secure scheme.
     * - IssuerNotEnrolled - This means that the issuer is not part of the 3-D Secure scheme.
     * - MalformedOrInvalid - This means that there is a problem with creating or receiving the 3D Secure data. These
     *   should not occur on the live environment.
     * - AttemptOnly - This means that the cardholder attempted to authenticate themselves but the process did not
     *   complete. A liability shift may occur for non-Maestro cards, depending on your merchant agreement.
     * - Incomplete - This means that the 3D Secure authentication was not available (normally at the card issuer site).
     */
    const REST_3DSECURE_STATUS_OK                   = 'Ok';
    const REST_3DSECURE_STATUS_AUTHENTICATED        = 'Authenticated';
    const REST_3DSECURE_STATUS_NOT_CHECKED          = 'NotChecked';
    const REST_3DSECURE_STATUS_NOT_AUTHENTICATED    = 'NotAuthenticated';
    const REST_3DSECURE_STATUS_ERROR                = 'Error';
    const REST_3DSECURE_STATUS_CARD_NOT_ENROLLED    = 'CardNotEnrolled';
    const REST_3DSECURE_STATUS_ISSUER_NOT_ENROLLED  = 'IssuerNotEnrolled';
    const REST_3DSECURE_STATUS_MALFORMED_OR_INVALID = 'MalformedOrInvalid';
    const REST_3DSECURE_STATUS_ATTEMPT_ONLY         = 'AttemptOnly';
    const REST_3DSECURE_STATUS_INCOMPLETE           = 'Incomplete';

    /**
     * Raw results for AddressStatus (PayPal only)
     * @var string
     */
    const ADDRESS_STATUS_NONE           = 'NONE';
    const ADDRESS_STATUS_CONFIRMED      = 'CONFIRMED';
    const ADDRESS_STATUS_UNCONFIRMED    = 'UNCONFIRMED';

    /**
     * Raw results for PayerStatus (PayPal only)
     * @var string
     */
    const PAYER_STATUS_VERIFIED     = 'VERIFIED';
    const PAYER_STATUS_UNVERIFIED   = 'UNVERIFIED';

    /**
     * The raw recorded card type that was used (Opayo Server).
     * TODO: a translation to OmniPay card brands would be useful.
     * @var string
     */
    const CARDTYPE_VISA     = 'VISA';
    const CARDTYPE_MC       = 'MC';
    const CARDTYPE_MCDEBIT  = 'MCDEBIT';
    const CARDTYPE_DELTA    = 'DELTA';
    const CARDTYPE_MAESTRO  = 'MAESTRO';
    const CARDTYPE_UKE      = 'UKE';
    const CARDTYPE_AMEX     = 'AMEX';
    const CARDTYPE_DC       = 'DC';
    const CARDTYPE_JCB      = 'JCB';
    const CARDTYPE_PAYPAL   = 'PAYPAL';

    /**
     * The raw FraudResponse values.
     * @var string
     */
    const FRAUD_RESPONSE_ACCEPT     = 'ACCEPT';
    const FRAUD_RESPONSE_CHALLENGE  = 'CHALLENGE';
    const FRAUD_RESPONSE_DENY       = 'DENY';
    const FRAUD_RESPONSE_NOTCHECKED = 'NOTCHECKED';
}
