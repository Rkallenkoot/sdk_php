<?php
namespace bunq\Model\Generated\Endpoint;

use bunq\Http\ApiClient;
use bunq\Model\Core\BunqModel;
use bunq\Model\Generated\Object\Amount;
use bunq\Model\Generated\Object\LabelCard;
use bunq\Model\Generated\Object\LabelMonetaryAccount;
use bunq\Model\Generated\Object\RequestInquiryReference;

/**
 * MasterCard transaction view.
 *
 * @generated
 */
class MasterCardAction extends BunqModel
{
    /**
     * Endpoint constants.
     */
    const ENDPOINT_URL_READ = 'user/%s/monetary-account/%s/mastercard-action/%s';
    const ENDPOINT_URL_LISTING = 'user/%s/monetary-account/%s/mastercard-action';

    /**
     * Object type.
     */
    const OBJECT_TYPE_GET = 'MasterCardAction';

    /**
     * The id of the MastercardAction.
     *
     * @var int
     */
    protected $id;

    /**
     * The id of the monetary account this action links to.
     *
     * @var int
     */
    protected $monetaryAccountId;

    /**
     * The id of the card this action links to.
     *
     * @var int
     */
    protected $cardId;

    /**
     * The amount of the transaction in local currency.
     *
     * @var Amount
     */
    protected $amountLocal;

    /**
     * The amount of the transaction in local currency.
     *
     * @var Amount
     */
    protected $amountConverted;

    /**
     * The amount of the transaction in the monetary account's currency.
     *
     * @var Amount
     */
    protected $amountBilling;

    /**
     * The original amount in local currency.
     *
     * @var Amount
     */
    protected $amountOriginalLocal;

    /**
     * The original amount in the monetary account's currency.
     *
     * @var Amount
     */
    protected $amountOriginalBilling;

    /**
     * The fee amount as charged by the merchant, if applicable.
     *
     * @var Amount
     */
    protected $amountFee;

    /**
     * The response code by which authorised transaction can be identified as
     * authorised by bunq.
     *
     * @var string
     */
    protected $cardAuthorisationIdResponse;

    /**
     * Why the transaction was denied, if it was denied, or just ALLOWED.
     *
     * @var string
     */
    protected $decision;

    /**
     * Empty if allowed, otherwise a textual explanation of why it was denied.
     *
     * @var string
     */
    protected $decisionDescription;

    /**
     * Empty if allowed, otherwise a textual explanation of why it was denied in
     * user's language.
     *
     * @var string
     */
    protected $decisionDescriptionTranslated;

    /**
     * The description for this transaction to display.
     *
     * @var string
     */
    protected $description;

    /**
     * The status in the authorisation process.
     *
     * @var string
     */
    protected $authorisationStatus;

    /**
     * The type of transaction that was delivered using the card.
     *
     * @var string
     */
    protected $authorisationType;

    /**
     * The type of entry mode the user used. Can be 'ATM', 'ICC',
     * 'MAGNETIC_STRIPE' or 'E_COMMERCE'.
     *
     * @var string
     */
    protected $panEntryModeUser;

    /**
     * The setlement status in the authorisation process.
     *
     * @var string
     */
    protected $settlementStatus;

    /**
     * The city where the message originates from as announced by the terminal.
     *
     * @var string
     */
    protected $city;

    /**
     * The monetary account label of the account that this action is created
     * for.
     *
     * @var LabelMonetaryAccount
     */
    protected $alias;

    /**
     * The monetary account label of the counterparty.
     *
     * @var LabelMonetaryAccount
     */
    protected $counterpartyAlias;

    /**
     * The label of the card.
     *
     * @var LabelCard
     */
    protected $labelCard;

    /**
     * If this is a tokenisation action, this shows the status of the token.
     *
     * @var string
     */
    protected $tokenStatus;

    /**
     * If this is a reservation, the moment the reservation will expire.
     *
     * @var string
     */
    protected $reservationExpiryTime;

    /**
     * The type of the limit applied to validate if this MasterCardAction was
     * within the spending limits. The returned string matches the limit types
     * as defined in the card endpoint.
     *
     * @var string
     */
    protected $appliedLimit;

    /**
     * Whether or not chat messages are allowed.
     *
     * @var bool
     */
    protected $allowChat;

    /**
     * The whitelist id for this mastercard action or null.
     *
     * @var int
     */
    protected $eligibleWhitelistId;

    /**
     * The secure code id for this mastercard action or null.
     *
     * @var int
     */
    protected $secureCodeId;

    /**
     * The ID of the wallet provider as defined by MasterCard. 420 = bunq
     * Android app with Tap&Pay; 103 = Apple Pay.
     *
     * @var string
     */
    protected $walletProviderId;

    /**
     * The reference to the object used for split the bill. Can be
     * RequestInquiry or RequestInquiryBatch
     *
     * @var RequestInquiryReference[]
     */
    protected $requestReferenceSplitTheBill;

    /**
     * @param int $masterCardActionId
     * @param int|null $monetaryAccountId
     * @param string[] $customHeaders
     *
     * @return BunqResponseMasterCardAction
     */
    public static function get(
        int $masterCardActionId,
        int $monetaryAccountId = null,
        array $customHeaders = []
    ): BunqResponseMasterCardAction {
        $apiClient = new ApiClient(static::getApiContext());
        $responseRaw = $apiClient->get(
            vsprintf(
                self::ENDPOINT_URL_READ,
                [static::determineUserId(), static::determineMonetaryAccountId($monetaryAccountId), $masterCardActionId]
            ),
            [],
            $customHeaders
        );

        return BunqResponseMasterCardAction::castFromBunqResponse(
            static::fromJson($responseRaw, self::OBJECT_TYPE_GET)
        );
    }

    /**
     * This method is called "listing" because "list" is a restricted PHP word
     * and cannot be used as constants, class names, function or method names.
     *
     * @param int|null $monetaryAccountId
     * @param string[] $params
     * @param string[] $customHeaders
     *
     * @return BunqResponseMasterCardActionList
     */
    public static function listing(
        int $monetaryAccountId = null,
        array $params = [],
        array $customHeaders = []
    ): BunqResponseMasterCardActionList {
        $apiClient = new ApiClient(static::getApiContext());
        $responseRaw = $apiClient->get(
            vsprintf(
                self::ENDPOINT_URL_LISTING,
                [static::determineUserId(), static::determineMonetaryAccountId($monetaryAccountId)]
            ),
            $params,
            $customHeaders
        );

        return BunqResponseMasterCardActionList::castFromBunqResponse(
            static::fromJsonList($responseRaw, self::OBJECT_TYPE_GET)
        );
    }

    /**
     * The id of the MastercardAction.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @deprecated User should not be able to set values via setters, use
     * constructor.
     *
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * The id of the monetary account this action links to.
     *
     * @return int
     */
    public function getMonetaryAccountId()
    {
        return $this->monetaryAccountId;
    }

    /**
     * @deprecated User should not be able to set values via setters, use
     * constructor.
     *
     * @param int $monetaryAccountId
     */
    public function setMonetaryAccountId($monetaryAccountId)
    {
        $this->monetaryAccountId = $monetaryAccountId;
    }

    /**
     * The id of the card this action links to.
     *
     * @return int
     */
    public function getCardId()
    {
        return $this->cardId;
    }

    /**
     * @deprecated User should not be able to set values via setters, use
     * constructor.
     *
     * @param int $cardId
     */
    public function setCardId($cardId)
    {
        $this->cardId = $cardId;
    }

    /**
     * The amount of the transaction in local currency.
     *
     * @return Amount
     */
    public function getAmountLocal()
    {
        return $this->amountLocal;
    }

    /**
     * @deprecated User should not be able to set values via setters, use
     * constructor.
     *
     * @param Amount $amountLocal
     */
    public function setAmountLocal($amountLocal)
    {
        $this->amountLocal = $amountLocal;
    }

    /**
     * The amount of the transaction in local currency.
     *
     * @return Amount
     */
    public function getAmountConverted()
    {
        return $this->amountConverted;
    }

    /**
     * @deprecated User should not be able to set values via setters, use
     * constructor.
     *
     * @param Amount $amountConverted
     */
    public function setAmountConverted($amountConverted)
    {
        $this->amountConverted = $amountConverted;
    }

    /**
     * The amount of the transaction in the monetary account's currency.
     *
     * @return Amount
     */
    public function getAmountBilling()
    {
        return $this->amountBilling;
    }

    /**
     * @deprecated User should not be able to set values via setters, use
     * constructor.
     *
     * @param Amount $amountBilling
     */
    public function setAmountBilling($amountBilling)
    {
        $this->amountBilling = $amountBilling;
    }

    /**
     * The original amount in local currency.
     *
     * @return Amount
     */
    public function getAmountOriginalLocal()
    {
        return $this->amountOriginalLocal;
    }

    /**
     * @deprecated User should not be able to set values via setters, use
     * constructor.
     *
     * @param Amount $amountOriginalLocal
     */
    public function setAmountOriginalLocal($amountOriginalLocal)
    {
        $this->amountOriginalLocal = $amountOriginalLocal;
    }

    /**
     * The original amount in the monetary account's currency.
     *
     * @return Amount
     */
    public function getAmountOriginalBilling()
    {
        return $this->amountOriginalBilling;
    }

    /**
     * @deprecated User should not be able to set values via setters, use
     * constructor.
     *
     * @param Amount $amountOriginalBilling
     */
    public function setAmountOriginalBilling($amountOriginalBilling)
    {
        $this->amountOriginalBilling = $amountOriginalBilling;
    }

    /**
     * The fee amount as charged by the merchant, if applicable.
     *
     * @return Amount
     */
    public function getAmountFee()
    {
        return $this->amountFee;
    }

    /**
     * @deprecated User should not be able to set values via setters, use
     * constructor.
     *
     * @param Amount $amountFee
     */
    public function setAmountFee($amountFee)
    {
        $this->amountFee = $amountFee;
    }

    /**
     * The response code by which authorised transaction can be identified as
     * authorised by bunq.
     *
     * @return string
     */
    public function getCardAuthorisationIdResponse()
    {
        return $this->cardAuthorisationIdResponse;
    }

    /**
     * @deprecated User should not be able to set values via setters, use
     * constructor.
     *
     * @param string $cardAuthorisationIdResponse
     */
    public function setCardAuthorisationIdResponse($cardAuthorisationIdResponse)
    {
        $this->cardAuthorisationIdResponse = $cardAuthorisationIdResponse;
    }

    /**
     * Why the transaction was denied, if it was denied, or just ALLOWED.
     *
     * @return string
     */
    public function getDecision()
    {
        return $this->decision;
    }

    /**
     * @deprecated User should not be able to set values via setters, use
     * constructor.
     *
     * @param string $decision
     */
    public function setDecision($decision)
    {
        $this->decision = $decision;
    }

    /**
     * Empty if allowed, otherwise a textual explanation of why it was denied.
     *
     * @return string
     */
    public function getDecisionDescription()
    {
        return $this->decisionDescription;
    }

    /**
     * @deprecated User should not be able to set values via setters, use
     * constructor.
     *
     * @param string $decisionDescription
     */
    public function setDecisionDescription($decisionDescription)
    {
        $this->decisionDescription = $decisionDescription;
    }

    /**
     * Empty if allowed, otherwise a textual explanation of why it was denied in
     * user's language.
     *
     * @return string
     */
    public function getDecisionDescriptionTranslated()
    {
        return $this->decisionDescriptionTranslated;
    }

    /**
     * @deprecated User should not be able to set values via setters, use
     * constructor.
     *
     * @param string $decisionDescriptionTranslated
     */
    public function setDecisionDescriptionTranslated($decisionDescriptionTranslated)
    {
        $this->decisionDescriptionTranslated = $decisionDescriptionTranslated;
    }

    /**
     * The description for this transaction to display.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @deprecated User should not be able to set values via setters, use
     * constructor.
     *
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * The status in the authorisation process.
     *
     * @return string
     */
    public function getAuthorisationStatus()
    {
        return $this->authorisationStatus;
    }

    /**
     * @deprecated User should not be able to set values via setters, use
     * constructor.
     *
     * @param string $authorisationStatus
     */
    public function setAuthorisationStatus($authorisationStatus)
    {
        $this->authorisationStatus = $authorisationStatus;
    }

    /**
     * The type of transaction that was delivered using the card.
     *
     * @return string
     */
    public function getAuthorisationType()
    {
        return $this->authorisationType;
    }

    /**
     * @deprecated User should not be able to set values via setters, use
     * constructor.
     *
     * @param string $authorisationType
     */
    public function setAuthorisationType($authorisationType)
    {
        $this->authorisationType = $authorisationType;
    }

    /**
     * The type of entry mode the user used. Can be 'ATM', 'ICC',
     * 'MAGNETIC_STRIPE' or 'E_COMMERCE'.
     *
     * @return string
     */
    public function getPanEntryModeUser()
    {
        return $this->panEntryModeUser;
    }

    /**
     * @deprecated User should not be able to set values via setters, use
     * constructor.
     *
     * @param string $panEntryModeUser
     */
    public function setPanEntryModeUser($panEntryModeUser)
    {
        $this->panEntryModeUser = $panEntryModeUser;
    }

    /**
     * The setlement status in the authorisation process.
     *
     * @return string
     */
    public function getSettlementStatus()
    {
        return $this->settlementStatus;
    }

    /**
     * @deprecated User should not be able to set values via setters, use
     * constructor.
     *
     * @param string $settlementStatus
     */
    public function setSettlementStatus($settlementStatus)
    {
        $this->settlementStatus = $settlementStatus;
    }

    /**
     * The city where the message originates from as announced by the terminal.
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @deprecated User should not be able to set values via setters, use
     * constructor.
     *
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * The monetary account label of the account that this action is created
     * for.
     *
     * @return LabelMonetaryAccount
     */
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * @deprecated User should not be able to set values via setters, use
     * constructor.
     *
     * @param LabelMonetaryAccount $alias
     */
    public function setAlias($alias)
    {
        $this->alias = $alias;
    }

    /**
     * The monetary account label of the counterparty.
     *
     * @return LabelMonetaryAccount
     */
    public function getCounterpartyAlias()
    {
        return $this->counterpartyAlias;
    }

    /**
     * @deprecated User should not be able to set values via setters, use
     * constructor.
     *
     * @param LabelMonetaryAccount $counterpartyAlias
     */
    public function setCounterpartyAlias($counterpartyAlias)
    {
        $this->counterpartyAlias = $counterpartyAlias;
    }

    /**
     * The label of the card.
     *
     * @return LabelCard
     */
    public function getLabelCard()
    {
        return $this->labelCard;
    }

    /**
     * @deprecated User should not be able to set values via setters, use
     * constructor.
     *
     * @param LabelCard $labelCard
     */
    public function setLabelCard($labelCard)
    {
        $this->labelCard = $labelCard;
    }

    /**
     * If this is a tokenisation action, this shows the status of the token.
     *
     * @return string
     */
    public function getTokenStatus()
    {
        return $this->tokenStatus;
    }

    /**
     * @deprecated User should not be able to set values via setters, use
     * constructor.
     *
     * @param string $tokenStatus
     */
    public function setTokenStatus($tokenStatus)
    {
        $this->tokenStatus = $tokenStatus;
    }

    /**
     * If this is a reservation, the moment the reservation will expire.
     *
     * @return string
     */
    public function getReservationExpiryTime()
    {
        return $this->reservationExpiryTime;
    }

    /**
     * @deprecated User should not be able to set values via setters, use
     * constructor.
     *
     * @param string $reservationExpiryTime
     */
    public function setReservationExpiryTime($reservationExpiryTime)
    {
        $this->reservationExpiryTime = $reservationExpiryTime;
    }

    /**
     * The type of the limit applied to validate if this MasterCardAction was
     * within the spending limits. The returned string matches the limit types
     * as defined in the card endpoint.
     *
     * @return string
     */
    public function getAppliedLimit()
    {
        return $this->appliedLimit;
    }

    /**
     * @deprecated User should not be able to set values via setters, use
     * constructor.
     *
     * @param string $appliedLimit
     */
    public function setAppliedLimit($appliedLimit)
    {
        $this->appliedLimit = $appliedLimit;
    }

    /**
     * Whether or not chat messages are allowed.
     *
     * @return bool
     */
    public function getAllowChat()
    {
        return $this->allowChat;
    }

    /**
     * @deprecated User should not be able to set values via setters, use
     * constructor.
     *
     * @param bool $allowChat
     */
    public function setAllowChat($allowChat)
    {
        $this->allowChat = $allowChat;
    }

    /**
     * The whitelist id for this mastercard action or null.
     *
     * @return int
     */
    public function getEligibleWhitelistId()
    {
        return $this->eligibleWhitelistId;
    }

    /**
     * @deprecated User should not be able to set values via setters, use
     * constructor.
     *
     * @param int $eligibleWhitelistId
     */
    public function setEligibleWhitelistId($eligibleWhitelistId)
    {
        $this->eligibleWhitelistId = $eligibleWhitelistId;
    }

    /**
     * The secure code id for this mastercard action or null.
     *
     * @return int
     */
    public function getSecureCodeId()
    {
        return $this->secureCodeId;
    }

    /**
     * @deprecated User should not be able to set values via setters, use
     * constructor.
     *
     * @param int $secureCodeId
     */
    public function setSecureCodeId($secureCodeId)
    {
        $this->secureCodeId = $secureCodeId;
    }

    /**
     * The ID of the wallet provider as defined by MasterCard. 420 = bunq
     * Android app with Tap&Pay; 103 = Apple Pay.
     *
     * @return string
     */
    public function getWalletProviderId()
    {
        return $this->walletProviderId;
    }

    /**
     * @deprecated User should not be able to set values via setters, use
     * constructor.
     *
     * @param string $walletProviderId
     */
    public function setWalletProviderId($walletProviderId)
    {
        $this->walletProviderId = $walletProviderId;
    }

    /**
     * The reference to the object used for split the bill. Can be
     * RequestInquiry or RequestInquiryBatch
     *
     * @return RequestInquiryReference[]
     */
    public function getRequestReferenceSplitTheBill()
    {
        return $this->requestReferenceSplitTheBill;
    }

    /**
     * @deprecated User should not be able to set values via setters, use
     * constructor.
     *
     * @param RequestInquiryReference[] $requestReferenceSplitTheBill
     */
    public function setRequestReferenceSplitTheBill($requestReferenceSplitTheBill)
    {
        $this->requestReferenceSplitTheBill = $requestReferenceSplitTheBill;
    }

    /**
     * @return bool
     */
    public function isAllFieldNull()
    {
        if (!is_null($this->id)) {
            return false;
        }

        if (!is_null($this->monetaryAccountId)) {
            return false;
        }

        if (!is_null($this->cardId)) {
            return false;
        }

        if (!is_null($this->amountLocal)) {
            return false;
        }

        if (!is_null($this->amountConverted)) {
            return false;
        }

        if (!is_null($this->amountBilling)) {
            return false;
        }

        if (!is_null($this->amountOriginalLocal)) {
            return false;
        }

        if (!is_null($this->amountOriginalBilling)) {
            return false;
        }

        if (!is_null($this->amountFee)) {
            return false;
        }

        if (!is_null($this->cardAuthorisationIdResponse)) {
            return false;
        }

        if (!is_null($this->decision)) {
            return false;
        }

        if (!is_null($this->decisionDescription)) {
            return false;
        }

        if (!is_null($this->decisionDescriptionTranslated)) {
            return false;
        }

        if (!is_null($this->description)) {
            return false;
        }

        if (!is_null($this->authorisationStatus)) {
            return false;
        }

        if (!is_null($this->authorisationType)) {
            return false;
        }

        if (!is_null($this->panEntryModeUser)) {
            return false;
        }

        if (!is_null($this->settlementStatus)) {
            return false;
        }

        if (!is_null($this->city)) {
            return false;
        }

        if (!is_null($this->alias)) {
            return false;
        }

        if (!is_null($this->counterpartyAlias)) {
            return false;
        }

        if (!is_null($this->labelCard)) {
            return false;
        }

        if (!is_null($this->tokenStatus)) {
            return false;
        }

        if (!is_null($this->reservationExpiryTime)) {
            return false;
        }

        if (!is_null($this->appliedLimit)) {
            return false;
        }

        if (!is_null($this->allowChat)) {
            return false;
        }

        if (!is_null($this->eligibleWhitelistId)) {
            return false;
        }

        if (!is_null($this->secureCodeId)) {
            return false;
        }

        if (!is_null($this->walletProviderId)) {
            return false;
        }

        if (!is_null($this->requestReferenceSplitTheBill)) {
            return false;
        }

        return true;
    }
}
