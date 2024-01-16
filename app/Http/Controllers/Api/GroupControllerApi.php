<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\FormerResponseForApi;
use App\Repositories\GroupDatabaseRepository;
use OpenApi\Annotations as OA;

/**
 * @OA\Info(
 *     title="Application API",
 *     version="1.0.0",
 *     description="API for managing application."
 * )
 */
 class GroupControllerApi extends Controller
 {
     public function __construct(private FormerResponseForApi $formerResponseForApi, private GroupDatabaseRepository $groupDatabaseRepository)
     {
 
     }
 
     /**
      * @OA\Get(
      *     path="/api/v1/group/show",
      *     summary="Get a list of groups with student counts",
      *     @OA\Parameter(
      *         name="format",
      *         in="query",
      *         description="Response format (json or xml)",
      *         required=false,
      *         @OA\Schema(type="string")
      *     ),
      *     @OA\Response(response="200", description="Successful response"),
      *     @OA\Response(response="400", description="Request error")
      * )
      */
     public function show(Request $request): Response
     {
         $groups = $this->groupDatabaseRepository->countStudentsDependentGroup();
 
         return $this->formerResponseForApi->responseForming($request, $groups);
     }
 }