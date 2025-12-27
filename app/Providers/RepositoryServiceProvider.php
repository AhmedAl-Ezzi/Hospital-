<?php

namespace App\Providers;

use App\Interfaces\Admin_dashboard\Ambulances\AmbulanceRepositoryInterface;
use App\Interfaces\Doctor_dashboard\Invoice\DiagnosisRepositoryInterface;
use App\Interfaces\Doctor_dashboard\Invoice\InvoicesRepositoryInterface;
use App\Interfaces\Admin_dashboard\Doctors\DoctorsRepositoryInterface;
use App\Interfaces\Admin_dashboard\Finance\PaymentRepositoryInterface;
use App\Interfaces\Admin_dashboard\Finance\ReceiptRepositoryInterface;
use App\Interfaces\Admin_dashboard\Index\IndexRepositoryInterface;
use App\Interfaces\Admin_dashboard\insurances\InsuranceRepositoryInterface;
use App\Interfaces\Admin_dashboard\LaboratorieEmployee\LaboratorieEmployeeRepositoryInterface;
use App\Interfaces\Admin_dashboard\Patients\PatientRepositoryInterface;
use App\Interfaces\Admin_dashboard\RayEmployee\RayEmployeeRepositoryInterface;
use App\Interfaces\Admin_dashboard\Sections\SectionRepositoryInterface;
use App\Interfaces\Admin_dashboard\Services\SingleServiceRepositoryInterface;
use App\Interfaces\Doctor_dashboard\Index\IndexRepositoryInterface as IndexIndexRepositoryInterface;
use App\Interfaces\Doctor_dashboard\Invoice\LaboratoriesRepositoryInterface;
use App\Interfaces\Doctor_dashboard\Invoice\RaysRepositoryInterface;
use App\Interfaces\LaboratorieEmployee_dashboard\LaboratorieInvoicesRepositoryInterface;
use App\Interfaces\Patient_dashboard\PatientInvoicesRepositoryInterface;
use App\Interfaces\RayEmployee_dashboard\RayInvoicesRepositoryInterface;
use App\Models\Service;
use App\Repository\Admin_dashboard\Ambulance\AmbulanceRepository;
use App\Repository\Doctor_dashboard\Invoice\DiagnosisRepository;
use App\Repository\Doctor_dashboard\Invoice\InvoicesRepository;
use App\Repository\Admin_dashboard\Doctors\DoctorRepository;
use App\Repository\Admin_dashboard\Finance\PaymentRepository;
use App\Repository\Admin_dashboard\Finance\ReceiptRepository;
use App\Repository\Admin_dashboard\Index\IndexRepository;
use App\Repository\Admin_dashboard\insurances\InsuranceRepository;
use App\Repository\Admin_dashboard\LaboratorieEmployee\LaboratorieEmployeeRepository;
use App\Repository\Admin_dashboard\RayEmployee\RayEmployeeRepository;
use App\Repository\Admin_dashboard\Patients\PatientRepository;
use App\Repository\Admin_dashboard\Sections\SectionRepository;
use App\Repository\Services\ServiceRepository;
use App\Repository\Admin_dashboard\Services\SingleServiceRepository;
use App\Repository\Doctor_dashboard\Index\IndexRepository as IndexIndexRepository;
use App\Repository\Doctor_dashboard\Invoice\LaboratoriesRepository;
use App\Repository\Doctor_dashboard\Invoice\RaysRepository;
use App\Repository\LaboratorieEmployee_dashboard\LaboratorieInvoicesRepository;
use App\Repository\Patient_dashboard\PatientInvoicesRepository;
use App\Repository\RayEmployee_dashboard\RayInvoicesRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {

        //admin

        $this->app->bind(SectionRepositoryInterface::class, SectionRepository::class);
        $this->app->bind(DoctorsRepositoryInterface::class, DoctorRepository::class);
        $this->app->bind(SingleServiceRepositoryInterface::class, SingleServiceRepository::class);
        $this->app->bind(InsuranceRepositoryInterface::class, InsuranceRepository::class);
        $this->app->bind(AmbulanceRepositoryInterface::class, AmbulanceRepository::class);
        $this->app->bind(PatientRepositoryInterface::class, PatientRepository::class);
        $this->app->bind(ReceiptRepositoryInterface::class, ReceiptRepository::class);
        $this->app->bind(PaymentRepositoryInterface::class, PaymentRepository::class);
        $this->app->bind(RayEmployeeRepositoryInterface::class, RayEmployeeRepository::class);
        $this->app->bind(IndexRepositoryInterface::class, IndexRepository::class);
        $this->app->bind(LaboratorieEmployeeRepositoryInterface::class, LaboratorieEmployeeRepository::class);



        //doctor

        $this->app->bind(InvoicesRepositoryInterface::class, InvoicesRepository::class);
        $this->app->bind(DiagnosisRepositoryInterface::class, DiagnosisRepository::class);
        $this->app->bind(RaysRepositoryInterface::class, RaysRepository::class);
        $this->app->bind(LaboratoriesRepositoryInterface::class, LaboratoriesRepository::class);
        $this->app->bind(IndexIndexRepositoryInterface::class, IndexIndexRepository::class);



        //rayEmployee

        $this->app->bind(RayInvoicesRepositoryInterface::class, RayInvoicesRepository::class);



        //laboratorieInvoices

        $this->app->bind(LaboratorieInvoicesRepositoryInterface::class, LaboratorieInvoicesRepository::class);



        //Patient

        $this->app->bind(PatientInvoicesRepositoryInterface::class, PatientInvoicesRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
