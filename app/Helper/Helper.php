<?php


namespace App\Helper;


use App\Models\Logs;
use DateTimeImmutable;
use Lcobucci\JWT\Configuration;
use Lcobucci\JWT\Signer\Hmac\Sha256;
use Lcobucci\JWT\Signer\Key\InMemory;

class Helper
{
    /**
     * @param $action
     * @param $element
     * @param $element_id
     */
    static function addLog($action, $element, $element_id)
    {
        Logs::create(["action" => $action, "element" => $element, "access_id" => \Session::get('accessKey_id'), "element_id" => $element_id]);
    }

    /**
     * @param array $data
     * @param Int $total
     * @param array $filters
     * @return \Illuminate\Http\Response
     */
    static function dataResponse($data, $total, Array $filters)
    {
        return response()->json([
            'code' => 'success',
            'data' => $data,
            "meta" => [
                "total" => $total,
                "links" => "",
                "filters" => $filters
            ]
        ], 200);
    }

    /**
     * @param $name
     * @param $element
     * @return \Illuminate\Http\Response
     */
    static function createdResponse($name, $element)
    {
        return response()->json([
            'code' => "Success",
            'message' => "$name created successfully",
            'data' => $element
        ], 201);
    }

    /**
     * @param array $details
     * @return \Illuminate\Http\Response
     */
    static function errorResponse(Array $details)
    {
        return response()->json([
            'code' => "Error",
            'message' => "Required fields not filled or formats not recognized !",
            'details' => $details
        ], 400);
    }

    /**
     * @param String $name
     * @return \Illuminate\Http\Response
     */
    static function createErrorResponse($name)
    {
        return response()->json([
            'code' => "Error",
            'message' => "Unexpected error, the $name has not been created."
        ], 500);
    }

    /**
     * @param String $name
     * @return \Illuminate\Http\Response
     */
    static function updatedResponse($name, $element)
    {
        return response()->json([
            'code' => "Success",
            'message' => "$name updated successfully.",
            'data' => $element
        ], 200);
    }

    /**
     * @param String $name
     * @return \Illuminate\Http\Response
     */
    static function updatedErrorResponse($name)
    {
        return response()->json([
            'code' => "Error",
            'message' => "Failed to update $name : Nothing to update."
        ], 400);
    }

    /**
     * @param String $name
     * @return \Illuminate\Http\Response
     */
    static function deleteResponse($name)
    {
        return response()->json([
            'code' => "Success",
            'message' => "$name deleted successfully"
        ], 200);
    }

    /**
     * Create token of account
     * @param $account
     * @return string
     * @throws \Exception
     */
    static function generateToken($account)
    {
        $configuration = Configuration::forSymmetricSigner(
            new Sha256(),
            InMemory::base64Encoded('mBC5v1sOKVvbdEitdSBenu59nfNfhwkedkJVNabosTw=')
        );
        $now = new DateTimeImmutable();
        $token = $configuration->builder()
            ->issuedAt($now)
            ->withClaim('uid', $account->id)
            ->getToken($configuration->signer(), $configuration->signingKey());
        return $token->toString();
    }

    /**
     * @param String $gender
     * @return int
     */
    static function getGender($gender)
    {
        switch ($gender) {
            case "male":
                return 1;
                break;
            case "female":
                return 2;
                break;
            default:
                return 0;
                break;
        }
    }

    /**
     * Default scopes for users
     * @return string
     */
    static function getAccountScopes()
    {
        return json_encode([
            "contacts.addToSegment",
            "contacts.deleteFromSegment",
            "contacts.index",
            "contacts.store",
            "contacts.update",
            "contacts.show",
            "accessKeys.store",
            "accessKeys.show",
            "accounts.show",
            "accounts.update",
            "authorizations.index",
            "fields.index",
            "fields.store",
            "fields.destroy",
            "fields.update",
            "forms.index",
            "forms.store",
            "forms.destroy",
            "forms.update",
            "forms.show",
            "logs.index",
            "medias.index",
            "messages.index",
            "profiles.index",
            "profiles.store",
            "profiles.destroy",
            "profiles.update",
            "requests.index",
            "responders.index",
            "responders.store",
            "responders.update",
            "responders.show",
            "segments.index",
            "segments.store",
            "segments.update",
            "segments.delete",
            "segments.show",
            "questions.index",
            "questions.store",
            "questions.update",
            "questions.delete",
        ]);
    }

    /**
     * Default scopes for users
     * @return array
     */
    static function getViewScopes()
    {
        return [
            "contacts" => [
                "Add to segment" => "contacts.addToSegment",
                "Delete from segment" => "contacts.deleteFromSegment",
                "List" => "contacts.index",
                "Add" => "contacts.store",
                "Update" => "contacts.update",
                "Show" => "contacts.show"
            ],
            "accessKeys" => [
                "Add" => "accessKeys.store",
                "Show" => "accessKeys.show"
            ],
            "accounts" => [
                "Show" => "accounts.show",
                "Update" => "accounts.update",
            ],
            "authorizations" => [
                "List" => "authorizations.index",
            ],
            "fields" => [
                "List" => "fields.index",
                "Add" => "fields.store",
                "Delete" => "fields.destroy",
                "Update" => "fields.update",
            ],
            "forms" => [
                "List" => "forms.index",
                "Add" => "forms.store",
                "Destroy" => "forms.destroy",
                "Update" => "forms.update",
                "Show" => "forms.show",
            ],
            "logs" => [
                "List" => "logs.index",
            ],
            "medias" => [
                "List" => "medias.index",
            ],
            "messages" => [
                "List" => "messages.index",
            ],
            "profiles" => [
                "List" => "profiles.index",
                "Add" => "profiles.store",
                "Delete" => "profiles.destroy",
                "Update" => "profiles.update",
            ],
            "requests" => [
                "List" => "requests.index",
            ],
            "responders" => [
                "List" => "responders.index",
                "Add" => "responders.store",
                "Update" => "responders.update",
                "Show" => "responders.show",
            ],
            "segments" => [
                "List" => "segments.index",
                "Add" => "segments.store",
                "Update" => "segments.update",
                "Show" => "segments.show",
            ]
        ];
    }


}
