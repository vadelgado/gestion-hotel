import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';

export default function Dashboard({ role }) {
    return (
        <AuthenticatedLayout
            header={
                <h2 className="text-xl font-semibold leading-tight text-gray-800">
                    Dashboard
                </h2>                
            }
        >
            <Head title="Dashboard" />

            <div className="py-12">
                <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div className="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                        <div className="p-6 text-gray-900">
                        <ContentByRole role={role} />
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}

const ContentByRole = ({ role }) => {
    switch (role) {
        case 1:
            return <AdminContent />;
        case 2:
            return <CounterContent />;
        case 3:
            return <ReceptionistContent />;
        default:
            return <div>No tienes acceso a esta página.</div>;
    }
};

const AdminContent = () => <div>Contenido del Administrador</div>;
const CounterContent = () => <div>Contenido del Contador</div>;
const ReceptionistContent = () => <div>Contenido del Recepcionista</div>;