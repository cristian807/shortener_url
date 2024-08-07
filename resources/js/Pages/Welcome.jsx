import { Head } from '@inertiajs/react';
import TableDefault from '@/Components/tableDefault';
import ButtonPluss from '@/Components/ButtonPluss';
import Guest from '@/Layouts/GuestLayout';
import ContentCard from '@/Components/ContentCard';

export default function Welcome({shorteners, message}) {


    return (
        <>
            <Head title="Welcome" />
            <Guest>
                {
                    message
                }
                <ContentCard>
                    <div className="flex justify-between mb-3">
                        <span className="text-gray-800 font-semibold">
                            Shotened urls
                        </span>
                        <ButtonPluss/>
                    </div>
                    <TableDefault shorteners={shorteners}/>
                </ContentCard>
            </Guest>
        </>
    );
}
