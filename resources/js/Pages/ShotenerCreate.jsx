import Guest from "@/Layouts/GuestLayout"
import ContentCard from "@/Components/ContentCard"
import { useForm } from '@inertiajs/react';
import TextInput from "@/Components/TextInput";
import { useEffect } from 'react';
import ButtonBack from "@/Components/ButtonBack";
import ErrorsValidations from "@/Components/ErrorsValidations";
export default function ShotenerCreate() {

    const { data, setData, post, processing, errors, reset } = useForm({
        origin_url: '',
    });

    useEffect(() => {
        return () => {
            reset('origin_url');
        };
    }, []);

    const submit=(e)=>{
        e.preventDefault();
        post(route('shortener.store'));
    }

    return (
        <>
            <Guest>
                <ContentCard>
                    <div className="flex justify-between mb-3">
                        <span className="text-gray-800 font-semibold">
                            Create new URL
                        </span>
                        <ButtonBack/>
                    </div>
                    <form onSubmit={submit}>
                        <div className="block">
                            <TextInput
                                id="origin_url"
                                name="origin_url"
                                value={data.origin_url}
                                className="mt-1 block w-full"
                                placeholder="Ingresa tu URL a recortar..."
                                isFocused={true}
                                onChange={(e) => setData('origin_url', e.target.value)}
                            />
                            <ErrorsValidations message={errors.origin_url}/>

                            <div className="flex mt-3 justify-end">
                                <button className="bg-gray-200 px-4 py-1 hover:bg-gray-300 rounded-sm shadown-md">Crear</button>
                            </div>
                        </div>
                    </form>
                </ContentCard>
            </Guest>
        </>
    )
}
