export type Events = {
    start_date: string;
    description: string;
    end_date: string;
    title: string;
    googleEvent: {
        id: string;
        description: string | null;
        start_date: string | null;
        end_date: string | null;
    } | null;
};
