<?php

namespace Ibexa\Gpc202401TestingDeepDiveBundle\Controller;

use Ibexa\Gpc202401TestingDeepDiveBundle\DataSource\QuotaRequestDataSource;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

final class QuotaRequestsController extends AbstractController
{
    public function __invoke(QuotaRequestDataSource $quotaRequestDataSource): Response
    {
        $quotas = $quotaRequestDataSource->findAll();

        return $this->render('admin/quota-requests/quota-requests.html.twig', [
            'quotas' => $quotas,
        ]);
    }
}
